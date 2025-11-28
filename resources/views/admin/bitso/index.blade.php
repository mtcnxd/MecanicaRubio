@extends('includes.body')

@section('content')
<div class="window-container mb-0">
    @include('includes.alert')
    <h6 class="window-title shadow text-uppercase fw-bold">
        <span class="ms-3">Bitso wallet</span>
    </h6>
    <div class="window-body shadow py-4">
        <p class="fw-bold ps-2">Libro de compras</p>
        <table class="table table-hover table-responsive" id="bitso">
            <thead class="thead-inverse">
                <tr>
                    <th>Libro</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Precio compra</th>
                    <th class="text-end">Valor compra</th>
                    <th class="text-end">Valor actual</th>
                    <th class="text-end">G/L %</th>
                    <th class="text-end">Fecha de compra</th>
                    <th style="width: 30px;"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sumCurrentValue = 0;
                @endphp
                @foreach ($bitso as $item)
                    @php
                        $sumCurrentValue += $item->currentPurchaseValue($item->book);
                    @endphp
                    <tr>
                        <td scope="row">{{ $item->book }}</td>
                        <td class="text-end">{{ $item->amount }}</td>
                        <td class="text-end">{{ Number::currency($item->price) }}</td>
                        <td class="text-end">{{ Number::currency($item->purchase_value) }}</td>
                        <td class="text-end">{{ Number::currency($item->currentPurchaseValue($item->book)) }}</td>
                        <td class="text-end">
                            @if ($item->currentGainOrLost($item->book) < 0)
                                <span class="badge text-bg-danger rounded-pill">{{ Number::percentage($item->currentGainOrLost($item->book), 2) }}</span>
                            @else
                                <span class="badge text-bg-success rounded-pill">{{ Number::percentage($item->currentGainOrLost($item->book), 2) }}</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <span title="{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}">{{ Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</span>
                        </td>
                        <td class="text-end">
                            <a href="#" class="cancell-trade" data-id="{{ $item->id }}">
                                <x-feathericon-trash class="table-icon" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="text-end fw-bold">{{ $bitso->sum('amount') }}</td>
                    <td colspan="2"></td>
                    <td class="text-end fw-bold">{{ Number::currency($sumCurrentValue) }}</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
            
        <a href="#" class="ms-3 ps-3 pe-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addShopping">Nueva Compra</a>
    </div>
</div>

@include('admin.bitso.modal_create')

<div class="window-container mb-0">
    <div class="row">
        <div class="col-md-5">
            <h6 class="window-title shadow text-uppercase fw-bold">
                <span class="ms-3">Actualizar Saldo</span>
            </h6>
            <div class="window-body shadow p-4">
                <form action="{{ route('investments.update') }}" method="POST">
                    @csrf
                    <label for="investment_id" class="mb-1">Instrumento de inversion</label>
                    <select name="investment_id" class="form-select">
                        @foreach ($investments as $investment)
                            <option value="{{ $investment->id }}">{{ $investment->name }}</option>
                        @endforeach
                    </select>
                    <label for="amount" class="mt-3 mb-1">Cantidad actual</label>
                    <input type="text" name="amount" class="form-control">
                    <button type="submit" class="ps-3 pe-3 btn btn-sm btn-secondary mt-3">Actualizar Saldo</button>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Mis Inversiones</span></h6>
            <div class="window-body shadow pb-4">
                <table class="table table-hover table-responsive" id="bitso">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Activo</th>
                            <th class="text-end">Cantidad</th>
                            <th class="text-end">Incremento</th>
                            <th class="text-end">Porcentaje</th>
                            <th class="text-end" width="25%">Ultima actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sumDifference = 0;
                        @endphp

                        @foreach ($investments as $investment)
                            @if ($investment->investmentData->last())
                                @php
                                    $sumDifference += $investment->differenceBetweenDeposits();
                                @endphp

                                <tr>
                                    <td><a href="{{ route('investments.show', $investment->id) }}">{{ $investment->name }}</a></td>
                                    <td class="text-end">{{ Number::currency($investment->investmentData->last()->amount) }}</td>
                                    <td class="text-end">{{ Number::currency($investment->differenceBetweenDeposits()) }}</td>
                                    <td class="text-end">{{ Number::percentage($investment->investmentPercentage(), 1) }}</td>
                                    <td class="text-end">{{ Carbon\Carbon::parse($investment->investmentData->last()->created_at)->format('d M Y') }}</td>
                                </tr>                            
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td class="text-end fw-bold">{{ Number::currency($investments->sum('current_amount')) }}</td>
                            <td class="text-end fw-bold">{{ Number::currency($sumDifference) }}</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="window-container">
    <div class="row">
        <div class="col-md-5">
            <div class="widget-simple">
                <canvas id="chartRevenue"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartRevenue').getContext('2d');
    var incomes = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($charts->getRevenueChart()['labels']),
            datasets: [{
                data: @json($charts->getRevenueChart()['values']),
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

    $(".cancell-trade").on('click', function(event){
        event.preventDefault();
        
        $.ajax({
            url: "{{ route('bitso.destroy') }}",
            method:'GET',
            data:{
                id:this.dataset.id
            },
            success:function(response){
                Swal.fire({
                    text: response.message,
                    icon: response.type,
                    confirmButtonText: 'Aceptar'
                })
                .then(() => {
                    history.go();
                });
            }
        });
    });
</script>
@endsection