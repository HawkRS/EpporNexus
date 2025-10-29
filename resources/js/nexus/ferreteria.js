import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// --- FUNCIÓN AUXILIAR DE AGRUPAMIENTO ---
function groupArticulosByCategory(items) {
    if (!Array.isArray(items)) {
        console.error("Error: Los datos recibidos del API no son un array.");
        return {};
    }

    const grouped = items.reduce((acc, item) => {
        // Asegúrate que el campo 'categoria' exista en tu modelo Ferreteria
        const category = item.categoria || item.nombre_categoria || 'Sin Categoría';

        if (!acc[category]) {
            acc[category] = [];
        }

        item.editMode = item.editMode || { cantidad: false, precio_venta: false };
        item.original_cantidad = item.cantidad;
        item.original_precio_venta = item.precio_venta;

        acc[category].push(item);
        return acc;
    }, {});
    return grouped;
}

// --- COMPONENTE ALPINE (Recibe la URL de la API como argumento) ---
// Ahora se debe llamar así en la vista: x-data="inventoryManager('{{ url('ferreteria/inventory') }}')"
window.inventoryManager = function(apiUrl) {

    const API_BASE_URL = apiUrl;

    return {
        // Datos reactivos
        articulos: {},
        flatInventory: {},
        searchTerm: '',
        message: '',
        messageType: 'info',
        isLoading: true,
        isDeleteDialogOpen: false,
        dialogProduct: {},

        init() {
            // Utilizamos DOMContentLoaded para asegurar que Alpine y el componente se carguen correctamente
            // y que los elementos como el meta tag CSRF estén listos.
            document.addEventListener('DOMContentLoaded', () => {
                this.fetchInventory();
            });
        },

        // === LÓGICA DE FETCH DE DATOS (API) ===
        async fetchInventory() {
            this.isLoading = true;
            this.message = '';
            try {
                // Usamos la URL completa que se pasó desde Blade
                const response = await fetch(API_BASE_URL);

                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status} al llamar a ${API_BASE_URL}.`);
                }

                const flatData = await response.json();

                console.log("Datos planos recibidos del API:", flatData);

                // Procesamiento y agrupación
                this.articulos = groupArticulosByCategory(flatData);
                this.flatInventory = flatData;

                if (Array.isArray(flatData) && flatData.length === 0) {
                     this.showMessage('Inventario vacío. No hay artículos en la base de datos.', 'info');
                } else {
                     this.showMessage('Inventario cargado exitosamente.', 'success');
                }

            } catch (error) {
                console.error('Error FATAL al cargar el inventario:', error);
                this.showMessage('FALLÓ la carga: ' + error.message, 'danger');
            } finally {
                this.isLoading = false;
            }
        },

        // === LÓGICA DE EDICIÓN Y GUARDADO (API PUT) ===
        async saveItem(product, field) {
            product.editMode[field] = false;

            if (product[field] === product[`original_${field}`]) {
                return;
            }

            this.isLoading = true;

            try {
                // Construimos la URL completa para PUT
                const updateUrl = `${API_BASE_URL}/${product.id}`;

                const response = await fetch(updateUrl, {
                    method: 'POST', // Usamos POST para web.php
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ [field]: product[field], _method: 'PUT' }) // Enviamos _method: 'PUT'
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Error en el servidor al actualizar.');
                }

                product[`original_${field}`] = product[field];
                this.showMessage(`"${product.nombre}" actualizado.`, 'success');
            } catch (error) {
                console.error('Error al guardar:', error);
                product[field] = product[`original_${field}`];
                this.showMessage('Error al guardar: ' + error.message, 'danger');
            } finally {
                this.isLoading = false;
            }
        },

        // === LÓGICA DE ELIMINACIÓN (API DELETE) ===
        async confirmDelete() {
            const idToDelete = this.dialogProduct.id;
            const nameToDelete = this.dialogProduct.nombre;

            this.isLoading = true;
            this.closeDeleteDialog();

            try {
                // Construimos la URL completa para DELETE
                const deleteUrl = `${API_BASE_URL}/${idToDelete}`;

                const response = await fetch(deleteUrl, {
                    method: 'POST', // Usamos POST para web.php
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ _method: 'DELETE' }) // Enviamos _method: 'DELETE'
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Falló la eliminación en el servidor.');
                }

                // Lógica para eliminar del array local
                for (const category in this.articulos) {
                    const index = this.articulos[category].findIndex(p => p.id === idToDelete);
                    if (index !== -1) {
                        this.articulos[category].splice(index, 1);
                        if (this.articulos[category].length === 0) {
                            delete this.articulos[category];
                        }
                        break;
                    }
                }

                // Nota: La eliminación de flatInventory aquí es opcional, ya que solo usamos 'articulos' para renderizar.

                this.showMessage(`Artículo "${nameToDelete}" eliminado exitosamente.`, 'success');
            } catch (error) {
                console.error('Error al eliminar:', error);
                this.showMessage('Error al intentar eliminar el artículo: ' + error.message, 'danger');
            } finally {
                this.isLoading = false;
            }
        },

        // === LÓGICA DE EDICIÓN EN LÍNEA (EditItem, utilidades, etc.) ===
        editItem(product, field) {
            // ... (Lógica igual)
            for (const key in product.editMode) {
                product.editMode[key] = false;
            }
            product.editMode[field] = true;

            this.$nextTick(() => {
                const input = this.$el.querySelector(`input[data-id="${product.id}"][data-field="${field}"]`);
                if (input) {
                    input.focus();
                    input.select();
                }
            });
        },

        openDeleteDialog(product) {
            this.dialogProduct = product;
            // Usamos getOrCreateInstance para compatibilidad con Bootstrap 5
            const deleteModalEl = document.getElementById('deleteModal');
            let deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalEl);
            deleteModal.show();
            this.isDeleteDialogOpen = true;
        },

        closeDeleteDialog() {
            const deleteModalEl = document.getElementById('deleteModal');
            let deleteModal = bootstrap.Modal.getInstance(deleteModalEl);
            if (deleteModal) deleteModal.hide();
            this.isDeleteDialogOpen = false;
            this.dialogProduct = {};
        },

        showMessage(text, type = 'success') {
            this.message = text;
            this.messageType = type;
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                this.message = '';
            }, 3000);
        },

        formatCurrency(value) {
            return new Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(value);
        },

        calculateMargin(venta, costo) {
            const margin = venta - costo;
            return this.formatCurrency(margin);
        },

        get filteredInventory() {
            // ... (Lógica de filtrado igual)
            if (this.isLoading) return {};

            if (!this.searchTerm.trim()) {
                return this.articulos;
            }

            const term = this.searchTerm.toLowerCase().trim();
            const filtered = {};

            for (const category in this.articulos) {
                const products = this.articulos[category].filter(product => {
                    const productName = product.nombre ? product.nombre.toLowerCase() : '';
                    const productCode = product.codigo ? product.codigo.toLowerCase() : '';

                    return productName.includes(term) ||
                           productCode.includes(term) ||
                           category.toLowerCase().includes(term);
                });

                if (products.length > 0) {
                    filtered[category] = products;
                }
            }
            return filtered;
        },
    }
}
