/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Tickets init js
*/

import DataTable from "datatables.net";

import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

window.$.fn.DataTable = DataTable;

jQuery = window.$;

function changegasIngreso(){
  var needle2 = document.getElementById('ing_pub').value;
  console.log(needle2);
  if (needle2 == 0) {
    var total2 = document.getElementById('ing_total').value;
    var ingsubtotal = (total2/1.16).toFixed(2);
    document.getElementById('ing_subtotal').value = ingsubtotal;
    document.getElementById('ing_iva').value = (ingsubtotal*0.16).toFixed(2);
  }
  else if (needle2 == 1) {
    var total2 = document.getElementById('ing_total').value;
    console.log(total2);
    document.getElementById('ing_subtotal').value = total2;
    document.getElementById('ing_iva').value = 0;
  }

}

function changegasEgreso(){
  var needle = document.getElementById('egr_gas').value; console.log(needle);
  if (needle == 1) {
    document.getElementById('egr_subtotal').removeAttribute("disabled");
    document.getElementById('egr_iva').removeAttribute("disabled");
    document.getElementById('egr_subtotal').value = 0;
    document.getElementById('egr_iva').value = 0;
  }
  else if (needle == 0) {
    var total3 = document.getElementById('egr_total').value;
    var subtotal3 = (total3/1.16).toFixed(2);
    document.getElementById('egr_subtotal').value = subtotal3;
    document.getElementById('egr_iva').value = subtotal3*0.16;
    document.getElementById('egr_subtotal').disabled = true;
    document.getElementById('egr_iva').disabled = true;
  }

}

$(document).ready(function () {

    $('#EgresoTable').DataTable({
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

    $('#IngresoTable').DataTable({
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

    let gasolina = document.getElementById("egr_gas");
  if(gasolina)
  { gasolina.addEventListener('change', changegasEgreso); }

let egrtotals = document.getElementById("egr_total");
  if(egrtotals)
  {
    if (gasolina == 0) {
      //egrtotals.addEventListener('input', changegas);
      $('#egr_total').on('input', function() {
        var total = document.getElementById('egr_total').value;//console.log(total);
        var egrsubtotal2 = (total/1.16).toFixed(2);
        document.getElementById('egr_subtotal').value = egrsubtotal2;
        document.getElementById('egr_iva').value = (egrsubtotal2*0.16).toFixed(2);
      });
    }
  }

let publicogral = document.getElementById("ing_pub");
  if(publicogral)
  { publicogral.addEventListener('change', changegasIngreso); }

let ingtotals = document.getElementById("ing_total");
  if(ingtotals)
  {
    //ingtotals.addEventListener('input', changegas);
    if (publicogral == 0) {
      $('#ing_total').on('input', function() {
        var ingtotal = document.getElementById('ing_total').value;//console.log(ingtotal);
        var ingsubtotal2 = (ingtotal/1.16).toFixed(2);
        document.getElementById('ing_subtotal').value = ingsubtotal2;
        document.getElementById('ing_iva').value = (ingsubtotal2*0.16).toFixed(2);
      });
    }
  }

});
