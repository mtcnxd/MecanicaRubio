@extends('includes.body')

@section('content')
<div class="window-container">
    <h4>Resumen</h4>
    <hr class="mb-4" style="color: var(--orange-800);">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="widget-simple">
                        <div class="widget-simple-head">
                            <span class="pt-1">Autos Entregados</span>
                            <x-feathericon-tool class="window-title-icon"/>
                        </div>
                        <div class="widget-simple-body fs-3">
                            {{ $charts->chartCarsReleaseThisMonth()->count() }} autos
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-simple">
                        <div class="widget-simple-head">
                            <span class="pt-1">Nominas pagadas</span>
                            <x-feathericon-dollar-sign class="window-title-icon"/>
                        </div>
                        <div class="widget-simple-body fs-3">
                            {{ Number::currency($payroll->getTotalCurrentMonth()) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="widget-simple">
                        <div class="widget-simple-head">
                            <span class="pt-1">Ingresos</span>
                            <x-feathericon-dollar-sign class="window-title-icon"/>
                        </div>
                        <div class="widget-simple-body fs-3">
                            {{ Number::currency($data['income']) }}
                            <div class="fs-6">Autos entregados</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="widget-simple">
                        <div class="widget-simple-head">
                            <span class="pt-1">Egresos</span>
                            <x-feathericon-dollar-sign class="window-title-icon"/>
                        </div>
                        <div class="widget-simple-body fs-3">
                            {{ Number::currency($expense->getTotalCurrentMonth()) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <canvas id="incomes"></canvas>
        </div>
    </div>
    
    <hr class="mb-5" style="color: var(--orange-800);">

    <div class="row">
        <div class="col-md-4">
            <canvas id="services"></canvas>
        </div>

        <div class="col-md-4 mb-4">
            <div class="widget-simple">
                <div class="widget-simple-head">
                    <span class="pt-1">Lista autos entregados</span>
                    <x-feathericon-tool class="window-title-icon"/>
                </div>
                <div class="widget-simple-body" style="max-height:180px; overflow-y:overlay;">
                    <table class="table table-sm table-striped">
                        @foreach ($charts->chartCarsReleaseThisMonth() as $service)
                            <tr>
                                <td>{{ $service->car->carName() }}</td>
                                <td>{{ Carbon\Carbon::parse($service->finished_date)->format('d-m-Y') }}</td>
                                <td class="text-end">
                                    <x-feathericon-check-circle class="table-icon"/>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('incomes').getContext('2d');
    var incomes = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($charts->getServicesChart()['labels']),
            datasets: [{
                data: @json($charts->getServicesChart()['values']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    title: {
                        display: true,
                        text: 'AUTOMOVILES / SERVICIOS'
                    }
                }
            },
            plugins:{
                legend: {
                    display: false
                }
            }
        }
    });

    var ctx = document.getElementById('services').getContext('2d');
    var services = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($charts->getIncomeChart()['labels']),
            datasets: [{
                data: @json($charts->getIncomeChart()['values']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'INGRESOS POR MES'
                    }
                }
            },
            plugins:{
                legend: {
                    display: false
                }
            }
        }
    });    
</script>
@endsection