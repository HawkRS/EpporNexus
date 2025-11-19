/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Tickets init js
*/
import { Chart } from 'chart.js';
import DataTable from "datatables.net";

import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

window.$.fn.DataTable = DataTable;

jQuery = window.$;

$(document).ready(function () {
  $('#PedidoTable').DataTable({
    "order": [[0, 'desc']], 
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

  function renderDoughnutChart(id, labels, values, colors = []) {
    const canvas = document.getElementById(id);
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          data: values,
          backgroundColor: colors.length ? colors : [
            '#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1', '#17a2b8', '#fd7e14', '#ffda85'
          ],
          borderWidth: 3
        }]
      },
      options: {
        responsive: true,
        legend: {
          display: false
        },
        cutoutPercentage: 50,
        tooltips: {
          enabled: true,
          callbacks: {
            label: function (tooltipItem, data) {
              const value = data.datasets[0].data[tooltipItem.index];
              const label = data.labels[tooltipItem.index];

              // Formatear con comas y 2 decimales si es número
              const formattedValue = parseFloat(value).toLocaleString('es-MX', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
              });

              return `${label}: ${formattedValue}`;
            }
          }
        }
      }
    });
  }


  // ======== Gráfica de pedidos por estado ========
  const canvasEstado = document.getElementById('graficaPedidos');
  if (canvasEstado) {
    const ctxEstado = canvasEstado.getContext('2d');
    new Chart(ctxEstado, {
      type: 'doughnut',
      data: {
        labels: JSON.parse(canvasEstado.dataset.labels),
        datasets: [{
          data: JSON.parse(canvasEstado.dataset.values),
          backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
          borderWidth: 3
        }]
      },
      options: {
        responsive: true,
        legend: {display: false},
        cutoutPercentage:65,
        tooltip: {
          callbacks: {
            label: function (context) {
              return `${context.label}: ${context.raw} pedidos`;
            }
          }
        }
      }
    });
  }

  // ======== Gráfica de saldos ========
  const canvasSaldos = document.getElementById('graficaSaldos');
  if (canvasSaldos) {
    const labels = JSON.parse(canvasSaldos.dataset.labels);
    const values = JSON.parse(canvasSaldos.dataset.values);
    renderDoughnutChart('graficaSaldos', labels, values, ['#28a745', '#dc3545']);
  }

  // ======== Gráfica de productos más pedidos ========
  const canvasProductos = document.getElementById('graficaProductos');
  if (canvasProductos) {
    const labels = JSON.parse(canvasProductos.dataset.labels);
    const values = JSON.parse(canvasProductos.dataset.values);
    renderDoughnutChart('graficaProductos', labels, values);
  }

});
