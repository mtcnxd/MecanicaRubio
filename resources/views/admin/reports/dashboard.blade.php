@extends('includes.body')

@section('content')
<div class="window-container">
    <h3>Resumen</h3>
    
    <hr class="mb-4" style="color: var(--orange-800);">

    <div class="row">
        <div class="col-md-7" style="display: grid; align-content: space-between;">
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
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
            <div class="widget-simple bg-white rounded">
                <canvas id="incomes"></canvas>
            </div>
        </div>
    </div>
    <!--
    <hr class="mb-5" style="color: var(--orange-800);">
    -->
    <div class="row mt-5">
        <div class="col-md-5">
            <div class="widget-simple bg-white rounded">
                <canvas id="services"></canvas>
            </div>
        </div>

        <div class="col-md-7" style="display: grid;">
            <div class="widget-simple">
                <div class="widget-simple-head">
                    <span class="pt-1">Lista autos entregados</span>
                    <x-feathericon-tool class="window-title-icon"/>
                </div>
                <div class="widget-simple-body" style="min-height:180px; max-height:250px; overflow-y:overlay;">
                    <table class="table table-sm table-striped">
                        @foreach ($charts->chartCarsReleaseThisMonth() as $service)
                            <tr>
                                <td>{{ $service->car->carName() }}</td>
                                <td>{{ Carbon\Carbon::parse($service->finished_date)->format('j M Y') }}</td>
                                <td class="text-end">{{ Number::currency($service->total) }}</td>
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

    <div class="row mt-5">
        <div class="col-md-5">
            <div class="widget-simple">
                <div class="widget-simple-head">
                    <span class="pt-1">Tiempo promedio de entrega en los ultimos 6 meses</span>
                    <x-feathericon-clock class="window-title-icon"/>
                </div>
                <div class="widget-simple-body fs-3">
                    {{ Number::format($data['avg'], 0) }} Días
                </div>
            </div>
        </div>
    </div>

    <!--
    <hr class="mb-5" style="color: var(--orange-800);">
    -->
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