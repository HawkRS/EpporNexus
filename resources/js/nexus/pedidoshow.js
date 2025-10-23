
jQuery = window.$;

// Función principal que maneja la lógica de visualización y el atributo 'required'.
// Cuando se llama por el evento 'change', 'this' es el elemento <select id="datosenvio">.
const toggleDisplay = function() {
    // Si la función se llama desde un evento jQuery delegado, 'this' será el elemento <select>.
    const selectElement = (this && this.id === 'datosenvio')
        ? this
        : document.getElementById('datosenvio');

    if (!selectElement) return;

    // Usamos el método jQuery .val() para la extracción más confiable del valor.
    const selectValue = $(selectElement).val();
    const otrosDiv = document.getElementById('datosenviootros');
    const campos = otrosDiv ? otrosDiv.querySelectorAll('input') : [];

    // Convertimos el elemento DOM a un objeto jQuery para manipular Bootstrap Collapse
    const $otrosDiv = $(otrosDiv);

    if (!$otrosDiv.length) return; // Verificamos si el elemento existe

    // Check for value '2'
    if (selectValue === '2') {
        console.log('mostrando (COLLAPSE). Valor seleccionado:', selectValue);

        // **ACCIÓN COLLAPSE: Usar el método 'show' de Bootstrap**
        $otrosDiv.collapse.show;

        // Añadir 'required' para validación cuando está visible
        campos.forEach(input => input.setAttribute('required', 'required'));
    } else {
        console.log('ocultando (COLLAPSE). Valor seleccionado:', selectValue);

        // **ACCIÓN COLLAPSE: Usar el método 'hide' de Bootstrap**
        $otrosDiv.collapse;

        // Eliminar 'required' cuando está oculto
        campos.forEach(input => input.removeAttribute('required'));
    }
};


$(document).ready(function () {
    if (bolsaerrores.length > 0) {

        // 2. Usamos el selector del modal que contiene los errores y lo mostramos.
        // ADVERTENCIA: Debes asegurarte de que el div principal del modal tenga el ID #errorModal
        jQuery('#errorModal').modal('show');

    }
    const modalId = '#PaqueteriaModal';

    // 1. Delegación de Eventos (Método Robusto):
    $(modalId).on('change', '#datosenvio', toggleDisplay);


    // 2. Inicialización del Estado al Abrir el Modal:
    $(modalId).on('shown.bs.modal', function () {
        // Ejecutamos la función una vez al abrir el modal para establecer el estado inicial
        // Esto también asegura que si ya estaba en el estado 'collapse show', se ajuste.
        toggleDisplay();
    });

    // 3. Fallback: Inicialización directa (solo si el modal NO existe en el DOM al cargar la página)
    const selectEnvioReady = document.getElementById('datosenvio');
    const otrosDivReady = document.getElementById('datosenviootros');

    if (selectEnvioReady && otrosDivReady && !$(modalId).length) {
        toggleDisplay();
        $(document).on('change', '#datosenvio', toggleDisplay);
    }
});
