import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
// Envuelve toda la lógica para asegurar que se ejecuta cuando el DOM está completamente cargado.
document.addEventListener('DOMContentLoaded', function() {

    // Función principal que define el componente Alpine.js
    window.inventoryManager = function() {

        // Datos iniciales simulados, basados en la variable 'articulos'
        // En un entorno real, esta data vendría de una API
        const articulos = {
            "Herramienta Manual": [
                { id: 1, codigo: 'HM-001', nombre: 'Martillo de Uña Curva 16oz', cantidad: 50, costo_unitario: 150.50, precio_venta: 220.99, unidad_medida: 'unidad', editMode: {cantidad: false, precio_venta: false} },
                { id: 4, codigo: 'HM-002', nombre: 'Juego de Destornilladores (10 pzas)', cantidad: 120, costo_unitario: 200.00, precio_venta: 350.50, unidad_medida: 'juego', editMode: {cantidad: false, precio_venta: false} }
            ],
            "Seguridad": [
                { id: 2, codigo: 'SEG-001', nombre: 'Lentes de Seguridad Transparentes', cantidad: 200, costo_unitario: 12.00, precio_venta: 24.50, unidad_medida: 'unidad', editMode: {cantidad: false, precio_venta: false} },
                { id: 5, codigo: 'SEG-002', nombre: 'Guantes de Piel Reforzados', cantidad: 80, costo_unitario: 45.00, precio_venta: 85.00, unidad_medida: 'par', editMode: {cantidad: false, precio_venta: false} }
            ],
            "Abrasivos": [
                { id: 3, codigo: 'ABR-001', nombre: 'Disco de Corte Fino 4.5"', cantidad: 150, costo_unitario: 18.75, precio_venta: 35.00, unidad_medida: 'unidad', editMode: {cantidad: false, precio_venta: false} }
            ],
             "Electricidad": [
                { id: 6, codigo: 'EL-001', nombre: 'Cinta Aislante Negra (Rollo)', cantidad: 300, costo_unitario: 8.00, precio_venta: 15.00, unidad_medida: 'rollo', editMode: {cantidad: false, precio_venta: false} },
            ],
        };

        // Función auxiliar para aplanar el inventario y facilitar la búsqueda/gestión por ID
        function flattenInventory(inv) {
            let flat = {};
            for (const category in inv) {
                inv[category].forEach(item => {
                    flat[item.id] = item;
                });
            }
            return flat;
        }

        return {
            // Datos reactivos
            articulos: articulos, // Inventario agrupado por categoría
            flatInventory: flattenInventory(articulos), // Inventario plano para acceso rápido
            searchTerm: '',
            message: '',

            // Variables para el Modal de Edición Completa
            isModalOpen: false,
            modalProduct: {}, // Copia del producto que se está editando

            // Variables para el Diálogo de Eliminación
            isDeleteDialogOpen: false,
            dialogProduct: {}, // Producto a eliminar

            // === PROPIEDAD COMPUTADA PARA FILTRADO ===
            get filteredInventory() {
                if (!this.searchTerm) {
                    return this.articulos;
                }

                const term = this.searchTerm.toLowerCase();
                const filtered = {};

                for (const category in this.articulos) {
                    const products = this.articulos[category].filter(product => {
                        return product.nombre.toLowerCase().includes(term) ||
                               product.codigo.toLowerCase().includes(term) ||
                               category.toLowerCase().includes(term); // Permite buscar por categoría
                    });

                    if (products.length > 0) {
                        filtered[category] = products;
                    }
                }
                return filtered;
            },

            // === LÓGICA DE EDICIÓN EN LÍNEA ===
            editItem(product, field) {
                // Desactiva cualquier otro modo de edición en este producto
                for (const key in product.editMode) {
                    product.editMode[key] = false;
                }

                product.editMode[field] = true;

                this.$nextTick(() => {
                    // Selecciona el input recién mostrado
                    const input = this.$el.querySelector(`input[x-model.number="product.${field}"]`);
                    if (input) {
                        input.focus();
                        input.select();
                    }
                });
            },

            // Simula el guardado de un artículo (inline o modal)
            saveItem(product, source = 'modal') {
                if (source === 'inline') {
                    // Cierra el modo de edición inline
                    product.editMode.cantidad = false;
                    product.editMode.precio_venta = false;
                    this.showMessage(`Actualización en línea de ${product.nombre} guardada.`);
                }

                // *** Aquí se haría la llamada AJAX/Fetch a Laravel para persistir los datos. ***
                console.log(`Guardando artículo ${product.id}. Fuente: ${source}`);
            },

            // === LÓGICA DEL MODAL DE EDICIÓN COMPLETA ===
            openModal(product) {
                // Clona el objeto para la edición en el modal y muestra el modal
                this.modalProduct = JSON.parse(JSON.stringify(product));
                this.isModalOpen = true;
            },

            closeModal() {
                this.isModalOpen = false;
                this.modalProduct = {};
            },

            saveModalChanges() {
                // Aplica los cambios clonados al objeto original
                const originalProduct = this.flatInventory[this.modalProduct.id];
                Object.assign(originalProduct, this.modalProduct);

                this.closeModal();
                this.showMessage(`Cambios completos para ${originalProduct.nombre} guardados.`);

                this.saveItem(originalProduct, 'modal');
            },


            // === LÓGICA DEL DIÁLOGO DE ELIMINACIÓN ===
            openDeleteDialog(product) {
                this.dialogProduct = product;
                this.isDeleteDialogOpen = true;
            },

            closeDeleteDialog() {
                this.isDeleteDialogOpen = false;
                this.dialogProduct = {};
            },

            confirmDelete() {
                const idToDelete = this.dialogProduct.id;
                const nameToDelete = this.dialogProduct.nombre;

                // Elimina el producto del array 'articulos' reactivo
                for (const category in this.articulos) {
                    const index = this.articulos[category].findIndex(p => p.id === idToDelete);
                    if (index !== -1) {
                        this.articulos[category].splice(index, 1);
                        break;
                    }
                }

                // Eliminar del inventario plano
                if(this.flatInventory[idToDelete]) {
                    delete this.flatInventory[idToDelete];
                }

                this.closeDeleteDialog();
                this.showMessage(`Artículo "${nameToDelete}" eliminado exitosamente.`);

                // *** Aquí se haría la llamada DELETE AJAX a Laravel. ***
            },

            // Muestra un mensaje de notificación temporal (simula una respuesta del servidor)
            showMessage(text) {
                this.message = text;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(() => {
                    this.message = '';
                }, 3000);
            }
        }
    }
});