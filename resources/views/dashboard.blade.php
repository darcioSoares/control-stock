<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <div class="pt-8 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1><strong>Sistema de Controle de Lotes Por Operadoras</strong></h1>
                    </div>


                </div>
            </div>
        </div>

        <!-- 1 sessao -->
        <div class="grid grid-cols-2 py-10 pb-2">

            <div class="ml-0 col-span-2 lg:col-span-1"> 
                <div class=" mx-auto px-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        
                    <div x-data="{ chartOptions: {}, series: [] }" x-init="initChartLineColor()" x-ref="chart-line-color"></div>           

                    </div>    
                </div>
            </div> 
 
            <div class="ml-0 col-span-2 lg:col-span-1"> 
                <div class=" mx-auto px-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        
                    <div x-data="" x-init="initChart()" x-ref="chart"></div>           

                    </div>    
                </div>
            </div> 

            <div class="mr-0 col-span-2 pt-6 lg:col-span-1 lg:pt-0">
                <div class=" mx-auto px-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div x-data="{ chartOptions: {}, series: [] }" x-init="initChartLine()" x-ref="chart-line"></div>  
                                
                    </div>    
                </div>
            </div> 


        </div>
        </div>


    <script>
        function initChart() {
        // Defina suas opções de gráfico e dados da série aqui
        const chartOptions = {
        chart: {
        type: 'bar',
        },
        series: [{
        name: 'Sales',
        data: [30, 40, 45, 50, 49, 60, 70, 91, 125],
        }],
        };

        // Inicialize o gráfico ApexCharts
        const chart = new ApexCharts(document.querySelector('[x-ref="chart"]'), chartOptions);

        // Renderize o gráficoApexCharts
        chart.render();
        }
    </script> 

    <script>
        function initChartLine() {
        // Defina suas opções de gráfico e dados da série aqui
        const chartOptionsLine = {
        chart: {
        type: 'line',
        },
        series: [{
        name: 'Sales',
        data: [30, 40, 45, 50, 49, 60, 70, 91, 125],
        }],
        };

        // Inicialize o gráfico ApexCharts
        const chart = new ApexCharts(document.querySelector('[x-ref="chart-line"]'), chartOptionsLine);

        // Renderize o gráficoApexCharts
        chart.render();   
        }
    </script>

    <script>
        function initChartLineColor() {
            var options = {
            series: [{
            name: 'VIVO',
            data: [44, 55, 41, 37, 22, 43, 21]
            }, {
            name: 'ALGAR',
            data: [53, 32, 33, 52, 13, 43, 32]
            }, {
            name: 'OI',
            data: [12, 17, 11, 9, 15, 11, 20]
            }, {
            name: 'CLARO',
            data: [9, 7, 5, 8, 6, 9, 4]
            }, {
            name: 'SERRA',
            data: [25, 12, 19, 32, 25, 24, 10]
            }],
            chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            stackType: '100%'
            },
            plotOptions: {
            bar: {
                horizontal: true,
            },
            },
            stroke: {
            width: 1,
            colors: ['#fff']
            },
            title: {
            text: 'Vencimento dos lotes das operadoras'
            },
            xaxis: {
            categories: [ 90, 75, 60, 45, 30, 15],
            },
            tooltip: {
            y: {
                formatter: function (val) {
                return val + "K"
                }
            }
            },
            fill: {
            opacity: 1
            
            },
            legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
            }
            };
          
            var chart = new ApexCharts(document.querySelector('[x-ref="chart-line-color"]'), options);
            chart.render();
        }
    </script>
</x-app-layout>
