@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Bitso wallet</span></h6>
    <div class="window-body shadow py-4">
        <p class="fw-bold ps-2">Libro de compras actuales</p>
        <table class="table table-striped table-inverse table-responsive" id="bitso">
            <thead class="thead-inverse">
                <tr>
                    <th>Libro</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Precio compra</th>
                    <th class="text-end">Valor compra</th>
                    <th class="text-end">Valor actual</th>
                    <th class="text-end">G/L %</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bitsoData as $item)
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
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-end">{{ NUmber::currency(0) }}</td>
                    <td class="text-end">{{ NUmber::currency(0) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
            
        <a href="#" style="padding-left: 3px;" class="ms-3 btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#addShopping">Agregar</a>
    </div>
</div>

@include('admin.bitso.modal_create')
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script>
    new DataTable('#bitso', {
        pageLength: 10,
        lengthMenu: [10, 50, 100],
        columnDefs: [{
            orderable: false,
            target: [2,3,4,5]
        }]            
    });
</script>
@endsection