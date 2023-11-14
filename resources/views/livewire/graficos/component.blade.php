<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <div class="grid sm:grid-cols-1 lg:grid-cols-1 gap-6">

        <div
            class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">

            <canvas id="myChart"></canvas>

        </div>

        

        <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Card -->
            <div
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">

                <canvas id="myChart2"></canvas>

            </div>

            <div
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">

                <canvas id="myChart3"></canvas>

            </div>
        </div>

       
    </div>



</div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['{!! $registrosmes !!}'],
                datasets: [{
                    label: '{{ $registroslabel }}',
                    data: [{{ $registrostotal }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],

                }]
            },
            options: {

                responsive:true,
                maintainAspectRatio:false,
              

                plugins: {
                    title: {
                        display: true,
                        text: 'Correspondencia recibida año 2023'

                    },




                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                

            }
        });
    </script>



    <script>
        var ctx = document.getElementById('myChart3');

        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['{!! $dependencianombre !!}'],
                datasets: [{

                    data: [{{ $dependenciatotal }}],
                    backgroundColor: [
                        'rgba(248, 236, 51, 0.4)',
                        'rgba(35, 142, 237, 0.4)',
                        'rgb(201, 203, 207, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(201, 203, 207, 0.4)'
                    ]

                }]
            },
            options: {
              
                responsive:true,
                maintainAspectRatio:false,
             
                plugins: {
                    title: {
                        display: true,
                        text: 'Dependencias'
                    }
                }
            }
        });
    </script>



<script>
    var ctx = document.getElementById('myChart2');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['{!! $docuname !!}'],
            datasets: [{
                label: 'Tipos de Documentos Recibidos',
                data: [{{ $docutotal }}],
                backgroundColor: [
                    'rgba(237, 35, 35, 0.2)',
                    'rgba(35, 142, 237 , 0.2)',
                    'rgba(35, 237, 118 , 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],

            }]
        },
        options: {
          
            responsive:true,
            maintainAspectRatio:false,
           

            plugins: {
                title: {
                    display: true,
                    text: 'Tipos de Documentos Recibidos'
                }
            }
        }
    });
</script>

