@extends('includes.body')

@section('content')
<div class="window-container" style="margin-bottom: 50px;">
    @include('includes.alert')
    <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Bitso wallet</span></h6>
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
                    <th></th>
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
                        <td class="text-end" style="width: 20px;">
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
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>
            
        <a href="#" class="ms-3 ps-3 pe-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addShopping">Nueva compra</a>
    </div>
</div>

@include('admin.bitso.modal_create')

<div class="window-container">
    <div class="col-md-6">
        <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Mis Inversiones</span></h6>
        <div class="window-body shadow pb-4">
            <table class="table table-hover table-responsive" id="bitso">
                <thead class="thead-inverse">
                    <tr>
                        <th>Activo</th>
                        <th class="text-end">Cantidad</th>
                        <th class="text-end">Porcentaje</th>
                        <th class="text-end" width="25%">Ultima actualizacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investments as $investment)
                        @if ($investment->investmentData->last())
                            <tr>
                                <td>{{ $investment->name }}</td>
                                <td class="text-end">{{ Number::currency($investment->investmentData->last()->amount) }}</td>
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
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
                
            <a href="#" class="ms-2 ps-3 pe-3 btn btn-sm btn-secondary">Actualizar Inversion</a>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".cancell-trade").on('click', function(event){
        event.preventDefault();
        
        $.ajax({
            url: "{{ route('mybitso.destroy') }}",
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