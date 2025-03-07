@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
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
                            @php
                                $count = count($services);
                            @endphp
                            {{ ($count > 1) ? $count.' autos' : $count.' auto' }}
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
                            {{ '$'.number_format($salaries->sum('total'), 2) }}
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
                            @php
                                $total_income = 0;
                            @endphp
                            @foreach ($services as $income)
                                @php
                                    $total_income += $income->price
                                @endphp
                            @endforeach
                            {{ '$'.number_format($total_income,2) }}
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
                            @php
                                $total_expenses = 0;
                            @endphp
                            @foreach ($expenses as $expense)
                                @php
                                    $total_expenses += $expense->amount * $expense->price;
                                @endphp
                            @endforeach
                            {{ '$'.number_format($total_expenses,2) }}
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

        <div class="col-md-3 mb-4">
            <div class="widget-simple">
                <div class="widget-simple-head">
                    <span class="pt-1">Lista servicios entregados</span>
                    <x-feathericon-tool class="window-title-icon"/>
                </div>
                <div class="widget-simple-body" style="max-height:180px; overflow-y:overlay;">
                    <table class="table table-sm table-striped">
                        @foreach ($services as $row => $service)
                            <tr>
                                <td>{{ $row +1 }}</td>
                                <td>{{ $service->car }}</td>
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

    <hr class="mb-5" style="color: var(--orange-800);">

    <div class="row">
        <div class="row col-md-4">
            <div class="col">
                <a class="btn btn-sm btn-outline-success" href="{{ route('reports.balance') }}">
                    Balance de resultados
                </a>
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
            labels: @json($servicesChart['labels']),
            datasets: [{
                data: @json($servicesChart['values']),
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
            labels: @json($incomesChart['labels']),
            datasets: [{
                data: @json($incomesChart['values']),
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