/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Tickets init js
*/

window.$.fn.DataTable = DataTable;

jQuery = window.$;

$(document).ready(function () {

  $('#paqueteria').on('shown.bs.modal', function () {
    //console.log('Modal abierto');

    const selectEnvio = document.getElementById('datosenvio');
    const otrosDiv = document.getElementById('datosenviootros');

    //if (!selectEnvio || !otrosDiv) return;
    //console.log(2);
    const campos = otrosDiv.querySelectorAll('input');

    const toggleOtros = () => {
      if (selectEnvio.value === '2') {
        console.log(2);
        otrosDiv.style.display = 'block';
        campos.forEach(input => input.setAttribute('required', 'required'));
      } else {
        otrosDiv.style.display = 'none';
        campos.forEach(input => input.removeAttribute('required'));
      }
    };

    // Vincula evento solo una vez (por si el modal se abre múltiples veces)
    selectEnvio.removeEventListener('change', toggleOtros); // Limpieza previa
    selectEnvio.addEventListener('change', toggleOtros);

    // Ejecutar una vez al abrir el modal
    toggleOtros();
  });

});

