import DataTable from "datatables.net";

import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

window.$.fn.DataTable = DataTable;

jQuery = window.$;

$(document).ready(function () {
    $('#IMSSTable').DataTable({
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
    });
});
