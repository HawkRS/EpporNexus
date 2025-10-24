import { Chart } from 'chart.js';
import DataTable from "datatables.net";

import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

window.$.fn.DataTable = DataTable;

jQuery = window.$;



document.addEventListener('DOMContentLoaded', function() {

  var anualsusana = document.getElementById('AnualSales');
  var AnualHEGS = new Chart(anualsusana, {
    type: 'bar',
    data: {
        labels: [
          'ENERO', 'FEBRERO', 'MARZO',
          'ABRIL', 'MAYO', 'JUNIO',
          'JULIO', 'AGOSTO', 'SEPTIEMBRE',
          'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE',
        ],
        datasets: [{
          label: 'Ventas',
          data: [
              ventasanuales['ene'], ventasanuales['feb'], ventasanuales['mar'],
              ventasanuales['abr'], ventasanuales['may'], ventasanuales['jun'],
              ventasanuales['jul'], ventasanuales['ago'], ventasanuales['sep'],
              ventasanuales['oct'], ventasanuales['nov'], ventasanuales['dic'],
            //75603,69300,
            //195630,220000,
            //15000,13500,
            //98500,12000,
            //55000,20000,
            //68000,25000,
            //ventas['cash']['ventatotal'],
          ],
          backgroundColor: [
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
            //'rgba(255, 206, 86, 0.9)',
            //'rgba(255, 99, 132, 0.9)',
            //'rgba(245, 167, 66, 0.9)',
            //'rgba(54, 162, 235, 0.9)',
            //'rgba(204, 101, 254, 0.9)',
          ],

          order:2
        }
        ]},
    options: {
        maintainAspectRatio: true,
        aspectRatio: 10,  // Ajusta la relación de aspecto
        scales: {
          y: {
              beginAtZero: true,
              max: 600000  // Ajusta este valor según tus necesidades
          }
        },
        animation:{
          animateScale: true,
          easing:'linear',
        },
        legend:{
          display:false,
        },

      }
});
    // === Datos de productos más vendidos ===
    const masVendidos = document.getElementById('graficaProductosAnuales');
    const productosLabels = JSON.parse(masVendidos.dataset.labels);
    const productosData = JSON.parse(masVendidos.dataset.values);

    const coloresProductos = [
        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'
    ];

    new Chart(document.getElementById('graficaProductosAnuales'), {
        type: 'doughnut',
        data: {
            labels: productosLabels,
            datasets: [{
                data: productosData,
                backgroundColor: coloresProductos,
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          legend: {display: false},
          cutoutPercentage:65,
          tooltip: {
              callbacks: {
                  label: function (context) {
                      return `${context.label}: ${context.parsed} piezas`;
                  }
              }
          }
        }
    });

    // === Datos de saldos totales (Cobrado vs Saldo pendiente) ===

    const saldosPendientes = document.getElementById('graficaSaldosTotales');
    const totalPagado = JSON.parse(saldosPendientes.dataset.cobrado);
    const totalSaldo = JSON.parse(saldosPendientes.dataset.saldo);

    // Función auxiliar para formatear números grandes con unidades (K, M, B)
    function formatLargeNumber(num) {
      // Asegurarse de que el número sea un tipo numérico
      num = parseFloat(num);

      if (isNaN(num)) {
        return num; // Devuelve el valor original si no es un número
      }

      if (num >= 1000000000) {
        return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'B'; // Billones
      }
      if (num >= 1000000) {
        return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M'; // Millones
      }
      if (num >= 1000) {
        return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K'; // Miles
      }
      return num.toLocaleString('es-MX', { minimumFractionDigits: 0, maximumFractionDigits: 2 }); // Formato normal si es menor a 1000
    }


    new Chart(document.getElementById('graficaSaldosTotales'), {
      type: 'doughnut',
      data: {
        labels: ['Pagado', 'Saldo pendiente'],
        datasets: [{
          data: [totalPagado, totalSaldo],
          backgroundColor: ['#1cc88a', '#e74a3b'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        legend: {display: false},
        cutoutPercentage:65,
        tooltips: { // Para Chart.js v2, se usa 'tooltips' (plural)
          callbacks: {
            label: function (tooltipItem, data) {
              const value = data.datasets[0].data[tooltipItem.index];
              const label = data.labels[tooltipItem.index];

              // --- Opción 1: Formato de moneda con comas y decimales ---
              const formattedValue = parseFloat(value).toLocaleString('es-MX', {
                style: 'currency',    // Indicar estilo de moneda
                currency: 'MXN',      // Especificar la moneda (Pesos Mexicanos)
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
              });
              return `${label}: ${formattedValue}`;

              // --- Opción 2: Formato abreviado (K, M, B) con símbolo de dólar ---
              // Si prefieres que números grandes se abrevien (ej. $1.5M, $20K)
              // const abbreviatedValue = '$' + formatLargeNumber(value);
              // return `${label}: ${abbreviatedValue}`;

            }
          }
        }
      }
    });

});