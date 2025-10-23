import * as echarts from 'echarts';
import { Chart } from 'chart.js';

const initAnualSalesChartJs = () => {
    const canvas = document.getElementById('AnualSales');

    // Validar que el canvas exista y que la variable de datos esté definida (simulada)
    if (!canvas || typeof ventaanual === 'undefined') {
        console.warn("Canvas 'AnualSales' o la variable 'ventaanual' no están disponibles.");
        return;
    }

    // Preparar datos: Nombres de los meses (labels) y los totales (data)
    const labels = ventaanual.map(item => item.mes);
    const dataValues = ventaanual.map(item => item.total);

    try {
        new Chart(canvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Venta Anual por Mes',
                    data: dataValues,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                        // ... agregar más colores
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Importante para el height="50%"
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total de Ventas'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Ocultar leyenda
                    },
                    title: {
                        display: true,
                        text: 'Ventas Mensuales del Año'
                    }
                }
            }
        });
    } catch (e) {
        console.error("Error al inicializar Chart.js para AnualSales. ¿Está Chart.js cargado?", e);
    }
};

// =========================================================
// 2. Gráfico de Pastel - Saldos Totales (ECharts)
// =========================================================

/**
 * Inicializa el gráfico de pastel de Saldos Totales usando ECharts.
 * Obtiene los datos directamente de los atributos 'data-' del canvas.
 */
const initGraficaSaldosTotalesEcharts = () => {
    const chartDom = document.getElementById('graficaSaldosTotales');

    if (!chartDom) {
        console.warn("Canvas 'graficaSaldosTotales' no encontrado.");
        return;
    }

    // Obtener datos de los atributos data-
    // Usamos JSON.parse para tratar las cadenas de atributos como números/objetos
    const saldo = parseFloat(chartDom.dataset.saldo || 0);
    const cobrado = parseFloat(chartDom.dataset.cobrado || 0);

    const data = [
        { value: cobrado, name: 'Total Cobrado' },
        { value: saldo, name: 'Saldo Pendiente' }
    ];

    try {
        const myChart = echarts.init(chartDom);
        const option = {
            title: {
                text: 'Total Cobrado vs. Saldo Pendiente',
                left: 'center',
                textStyle: {
                    fontSize: 16
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c} ({d}%)'
            },
            // Requisito: Ocultar la leyenda (cuadritos y nombres abajo)
            legend: {
                show: false
            },
            series: [
                {
                    name: 'Distribución',
                    type: 'pie',
                    radius: '60%', // Tamaño del pastel
                    data: data,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },
                    label: {
                        formatter: '{b}: {c} ({d}%)' // Mostrar nombre, valor y porcentaje
                    }
                }
            ]
        };
        myChart.setOption(option);

        // Adaptar el gráfico al redimensionar la ventana
        window.addEventListener('resize', () => myChart.resize());

    } catch (e) {
        console.error("Error al inicializar ECharts para Saldo Totales. ¿Está ECharts cargado?", e);
    }
};

// =========================================================
// 3. Gráfico de Dona - Productos Anuales (ECharts)
// =========================================================

/**
 * Inicializa el gráfico de dona (donut) de Productos Anuales usando ECharts.
 * Obtiene las etiquetas y valores de los atributos data- del canvas.
 */
const initGraficaProductosAnualesEcharts = () => {
    const chartDom = document.getElementById('graficaProductosAnuales');

    if (!chartDom) {
        console.warn("Canvas 'graficaProductosAnuales' no encontrado.");
        return;
    }

    // Obtener datos de los atributos data-
    // Los datos vienen como strings JSON de los atributos data-, se deben parsear
    const labels = JSON.parse(chartDom.dataset.labels || '[]');
    const values = JSON.parse(chartDom.dataset.values || '[]');

    // Combinar labels y values en el formato requerido por ECharts: [{ name, value }]
    const data = labels.map((name, index) => ({
        name: name,
        value: values[index]
    }));

    try {
        const myChart = echarts.init(chartDom);
        const option = {
            title: {
                text: 'Productos Más Vendidos (Último Año)',
                left: 'center',
                textStyle: {
                    fontSize: 16
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c} ({d}%)'
            },
            // Mostrar la leyenda en la parte inferior para la dona
            legend: {
                orient: 'horizontal',
                bottom: '0',
                data: labels
            },
            series: [
                {
                    name: 'Ventas por Producto',
                    type: 'pie',
                    radius: ['40%', '70%'], // Esto lo convierte en un gráfico de dona
                    center: ['50%', '50%'],
                    data: data,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },
                    label: {
                        show: false // Ocultar etiquetas para mantener el gráfico limpio
                    },
                    labelLine: {
                        show: false
                    }
                }
            ]
        };
        myChart.setOption(option);

        // Adaptar el gráfico al redimensionar la ventana
        window.addEventListener('resize', () => myChart.resize());

    } catch (e) {
        console.error("Error al inicializar ECharts para Productos Anuales. ¿Está ECharts cargado?", e);
    }
};


// =========================================================
// 4. FUNCIÓN PRINCIPAL DE INICIALIZACIÓN
// =========================================================

/**
 * Función principal para iniciar todas las funcionalidades del dashboard.
 */
export const initDashboard = () => {
    'use strict';

    // 💡 Ejecutar todas las funciones de inicialización de gráficos
    initAnualSalesChartJs();
    initGraficaSaldosTotalesEcharts();
    initGraficaProductosAnualesEcharts();

    console.log("Dashboard de Ventas inicializado con Chart.js y ECharts. ✅");
};


// =========================================================
// 5. EXPORTACIONES
// =========================================================

export {
    initAnualSalesChartJs,
    initGraficaSaldosTotalesEcharts,
    initGraficaProductosAnualesEcharts
};
