import { Chart } from 'chart.js';
import DataTable from "datatables.net";

// Asegúrate de que estas importaciones se resuelvan en tu entorno (Vite/Laravel Mix)
import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

// Asegura que DataTables esté disponible globalmente si se usa de esta forma
window.$.fn.DataTable = DataTable;

// Usamos const para jQuery, aunque ya debería ser global por DataTables
const jQuery = window.$;

jQuery(document).ready(function($) {

        const editModal = $('#editModal');
        const editForm = $('#editForm');
        const modalTitle = $('#editModalLabel');

        // Definir la plantilla de la ruta Laravel con un placeholder.
        // Esto asegura que la función route() de Laravel se use correctamente.
        const routeTemplate = "{{ route('ferreteria.update', ['ferreteria' => 'PLACEHOLDER_ID']) }}";

        // Escuchar el evento que se dispara JUSTO ANTES de que Bootstrap muestre el modal
        editModal.on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // El botón que hizo clic

            // 1. Extraer los datos usando .data() de jQuery
            const id = button.data('id');
            const nombre = button.data('nombre');
            // Se usan tus nombres de atributos: data-cantidad y data-costo
            const cantidad = button.data('cantidad');
            const costo = button.data('costo');

            // 2. Cargar los datos en los campos del formulario
            $('#editId').val(id);
            $('#editNombre').val(nombre);
            $('#editCantidad').val(cantidad);
            // El campo se llama editCosto
            $('#editCosto').val(costo);

            // 3. Actualizar el título del modal
            modalTitle.text(`Editar Soldadura: ${nombre}`);

            // 4. ACTUALIZAR DINÁMICAMENTE LA URL DE ACCIÓN
            // Reemplazamos el placeholder en la plantilla de la ruta
            const finalUrl = routeTemplate.replace('PLACEHOLDER_ID', id);

            // Asignar la URL de acción final al formulario
            editForm.attr('action', finalUrl);

            console.log(`Ruta de actualización: ${finalUrl}`);
        });

        // Opcional: Limpiar el formulario al cerrar el modal
        editModal.on('hidden.bs.modal', function () {
            editForm.trigger('reset');
        });
    });

document.addEventListener('DOMContentLoaded', function() {
  console.log('--- DEPURACIÓN DE DATOS DEL GRÁFICO ---');
  console.log('Datos inyectados (window.inversionPorCategoria):', window.inversionPorCategoria);

    // ==========================================================
    // INICIALIZACIÓN DE DATATABLES
    // ==========================================================

    const datatableConfig = {
        "pageLength": 5,
        "language": {
            "lengthMenu": "Mostrar _MENU_ entradas por pagina",
            "zeroRecords": "No hay entrdas existentes",
            "info": "Mostrando entradas del _PAGE_ al _PAGES_",
            "infoEmpty": "No hay entradas en la base",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            'paginate': {
                'previous': 'anterior',
                'next': 'siguiente'
            }
        },
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    };

    // Lista de IDs de tablas a inicializar
    const tableIds = ['#AbrasivosTable', '#ConsumiblesTable', '#MiscelaneosTable', '#SeguridadTable', '#SoldaduraTable'];

    tableIds.forEach(id => {
        // Inicializa cada DataTable con la configuración definida
        $(id).DataTable(datatableConfig);
    });


    // ==========================================================
    // INICIALIZACIÓN DE LA GRÁFICA (Doughnut Chart)
    // ==========================================================

    // Accedemos a la variable global inyectada desde Blade/PHP
    // Se usa || {} para asegurar que siempre sea un objeto si no se define
    const chartData = window.inversionPorCategoria || {};

    // Verificación simple de datos
    if (!chartData || Object.keys(chartData).length === 0) {
        // console.warn("Advertencia: No se encontraron datos para la gráfica de inversión.");
        return;
    }

    const labels = Object.keys(chartData);
    const dataValues = Object.values(chartData);

    const ctxElement = document.getElementById('FerreteriaValue');

    if (!ctxElement) {
        // console.error("Error: No se encontró el elemento canvas con el ID 'FerreteriaValue'.");
        return;
    }

    const ctx = ctxElement.getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: [
                    '#0acf97', // Success (Verde)
                    '#fa5c7c', // Danger (Rojo)
                    '#6c757d', // Secondary (Gris)
                    '#39afd1', // Primary (Azul)
                    '#ffbc00', // Warning (Amarillo)
                    '#39afd1', // Info (Celeste)
                    '#f7e387', // Más colores para categorías adicionales
                    '#8a5eab',
                    '#1abc9c',
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend:false,
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                // Formato a 2 decimales, con $ y separador de miles
                                const formattedValue = context.parsed.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                label += '$' + formattedValue;
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});
