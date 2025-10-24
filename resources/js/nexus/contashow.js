import { Chart } from 'chart.js';

/**
 * Espera a que el DOM esté completamente cargado antes de inicializar los gráficos.
 * Esto asegura que los elementos <canvas> con los IDs 'AnualIngresos' y 'AnualEgresos'
 * estén disponibles en la página.
 *
 * NOTA IMPORTANTE: Para que el 'import' de Chart.js funcione, el script debe ser
 * cargado en el HTML utilizando la etiqueta: <script type="module" src="..."></script>
 *
 * Se asume que la variable 'balances' (conteniendo los datos mensuales) está
 * accesible en el scope de este script (e.g., definida globalmente antes de la importación).
 */
document.addEventListener('DOMContentLoaded', function() {

    // --- GRÁFICO DE INGRESOS ---
    var anualingresos = document.getElementById('AnualIngresos');

    // Solo inicializar si el elemento canvas se encuentra
    if (anualingresos) {
        var AnualIngresos = new Chart(anualingresos, {
            type: 'bar',
            data: {
                labels: [
                    'ENERO', 'FEBRERO', 'MARZO',
                    'ABRIL', 'MAYO', 'JUNIO',
                    'JULIO', 'AGOSTO', 'SEPTIEMBRE',
                    'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE',
                ],
                datasets: [{
                    label: 'Ingresos (Payments)',
                    data: [
                        balances['ene']['income'], balances['feb']['income'], balances['mar']['income'],
                        balances['abr']['income'], balances['may']['income'], balances['jun']['income'],
                        balances['jul']['income'], balances['ago']['income'], balances['sep']['income'],
                        balances['oct']['income'], balances['nov']['income'], balances['dic']['income'],
                    ],
                    backgroundColor: [
                        'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
                        'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
                        'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
                        'rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)','rgba(28 , 200, 138, 0.9)',
                    ],
                    order:2
                }]
            },
            options: {
                maintainAspectRatio: false,
                animation:{
                    animateScale: true,
                    easing:'linear',
                },
                legend:{
                    display:false,
                },
            }
        });
    }


    // --- GRÁFICO DE EGRESOS ---
    var anualegresos = document.getElementById('AnualEgresos');

    // Solo inicializar si el elemento canvas se encuentra
    if (anualegresos) {
        var AnualEgresos = new Chart(anualegresos, {
            type: 'bar',
            data: {
                labels: [
                    'ENERO', 'FEBRERO', 'MARZO',
                    'ABRIL', 'MAYO', 'JUNIO',
                    'JULIO', 'AGOSTO', 'SEPTIEMBRE',
                    'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE',
                ],
                datasets: [{
                    label: 'Egresos (Payments)',
                    data: [
                        balances['ene']['outcome'], balances['feb']['outcome'], balances['mar']['outcome'],
                        balances['abr']['outcome'], balances['may']['outcome'], balances['jun']['outcome'],
                        balances['jul']['outcome'], balances['ago']['outcome'], balances['sep']['outcome'],
                        balances['oct']['outcome'], balances['nov']['outcome'], balances['dic']['outcome'],
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)',
                        'rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)',
                        'rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)','rgba(255, 99, 132, 0.9)',
                    ],
                    order:2
                }]
            },
            options: {
                maintainAspectRatio: false,
                animation:{
                    animateScale: true,
                    easing:'linear',
                },
                legend:{
                    display:false,
                },
            }
        });
    }
});
