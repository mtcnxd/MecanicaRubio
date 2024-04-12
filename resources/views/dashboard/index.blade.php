@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4>Resumen</h4>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="window-title-bar shadow-sm">
                        <h6 class="window-title-text">Servicios Entregados</h6>
                        <x-feathericon-tool class="window-title-icon"/>
                    </div>
                    <div class="window-body bg-white shadow-sm text-end fs-5">
                        @php
                            $countServices = count($services);
                        @endphp
                        {{ $countServices }} Servicio(s)
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="window-title-bar shadow-sm">
                        <h6 class="window-title-text">Ingresos por servicios entregados (Mano de obra)</h6>
                        <x-feathericon-dollar-sign class="window-title-icon"/>
                    </div>
                    <div class="window-body bg-white shadow-sm text-end fs-5">
                        @php
                            $total_income = 0;
                        @endphp
                        @foreach ($services as $income)
                            @php
                                $total_income += $income->price
                            @endphp
                        @endforeach
                        {{ '$'.number_format($total_income,2) }}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="window-title-bar shadow-sm">
                        <h6 class="window-title-text">Egresos</h6>
                        <x-feathericon-dollar-sign class="window-title-icon"/>
                    </div>
                    <div class="window-body bg-white shadow-sm text-end fs-5">
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

        <div class="col-md-4">
            <div class="col-md-12">
                <div class="window-title-bar shadow-sm">
                    <h6 class="window-title-text">Autos Entregados</h6>
                    <x-feathericon-tool class="window-title-icon"/>
                </div>
                <div class="window-body bg-white shadow-sm" style="overflow-y: scroll; padding:0px; max-height: 230px;">
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
    
    <h4 class="mt-4">Gráficas</h4>
    <hr class="mb-4">

    <div class="row">
        <div class="col-md-4">
            <canvas id="incomes"></canvas>
        </div>

        <div class="col-md-4">
            <canvas id="services"></canvas>
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
                    beginAtZero: true
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
            labels: ['Enero','Febreo','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{
                // label: 'Data',
                data: [20,30,25,35,40,20,28,38,23,40,43,58],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins:{
                legend: {
                    display: false
                }
            }
        }
    });    
</script>
@endsection