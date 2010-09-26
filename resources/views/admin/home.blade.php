@extends('layouts.master')
@section('page-title')
    Inicio
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $spare_count }}</h3>

                        <p>Productos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $user_count }}</h3>
                        <p>Empleados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $client_count }}</h3>

                        <p>Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-dark">
                        <h3 class="card-title">5 Mas Vendidos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/home/chart.min.js')}}"></script>
    <script>

        var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : false,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : false,
                    }
                }]
            }
        };

        var areaChartData = {
            labels  : [
                @foreach($list as $item)
                '{{$item->description}}',
                @endforeach
            ],
            datasets: [
                {
                    label               : 'Cantidad',
                    backgroundColor     : 'skyblue',
                    borderColor         : 'black',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [
                        @foreach($list as $item)
                            {{$item->SumQuantities}},
                        @endforeach
                    ]
                },
                // {
                //     label               : 'Electronics',
                //     backgroundColor     : 'rgba(210, 214, 222, 1)',
                //     borderColor         : 'rgba(210, 214, 222, 1)',
                //     pointRadius         : false,
                //     pointColor          : 'rgba(210, 214, 222, 1)',
                //     pointStrokeColor    : '#c1c7d1',
                //     pointHighlightFill  : '#fff',
                //     pointHighlightStroke: 'rgba(220,220,220,1)',
                //     data                : [65, 59, 80, 81, 56, 55, 40]
                // },
            ]
        };
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var barChartData = jQuery.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        // var temp1 = areaChartData.datasets[1];
        barChartData.datasets[0] = temp0;
        // barChartData.datasets[1] = temp0;

        var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        };

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });


    </script>
@endsection

