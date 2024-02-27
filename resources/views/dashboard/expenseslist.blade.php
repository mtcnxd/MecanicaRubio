@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Listado de egresos</h6>
        <x-feathericon-dollar-sign class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ( session('error') )
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <p class="p-2 pb-0 pt-0">Se encontraron {{ count($expenses) }} registros</p>
        <hr>
        <table class="table table-hover table-borderless" id="expenses">
            <thead>
                <tr>
                    <th>Egreso</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Cantidad / Precio</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $expense_total = 0;
                @endphp
                @foreach ($expenses as $expense)
                @php
                    $total = $expense->amount * $expense->price;
                @endphp

                <tr>
                    <td>
                        @if ($total > 750)
                            <x-feathericon-alert-triangle class="table-icon" style="margin: -2px 5px 0 0; color:red;"/>
                        @else 
                            <x-feathericon-check class="table-icon" style="margin: -2px 5px 0 0"/>
                        @endif
                        {{ $expense->name }}
                    </td>
                    <td>{{ $expense->description }}</td>
                    <td>{{ date('d-m-Y', strtotime($expense->created_at)) }}</td>
                    <td>{{ $expense->amount }} / {{ '$'.number_format($expense->price, 2) }}</td>
                    <td class="text-end">{{ '$'.number_format($total, 2) }}</td>
                    @php
                        $expense_total += $total;
                    @endphp
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-top">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="text-end fw-bold">TOTAL:</td>
                    <td class="text-end fw-bold">{{ '$'.number_format($expense_total, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection