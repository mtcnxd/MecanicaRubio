@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h3>Resumen semana</h3>
    <hr>
    <div class="row">
        <div class="col-md-4">
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

        <div class="col-md-4">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Servicios entregados</h6>
                <x-feathericon-dollar-sign class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm text-end fs-5">
                @php
                    $total_invoices = 0;
                @endphp
                @foreach ($services as $invoice)
                    @php
                        $total_invoices += $invoice->total
                    @endphp
                @endforeach
                {{ '$'.number_format($total_invoices,2) }}
            </div>
        </div>

        <div class="col-md-4">
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

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Autos Entregados</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <table class="table table-sm">
                @foreach ($services as $row => $service)
                    <tr>
                        <td>{{ $row +1 }}</td>
                        <td>{{ $service->brand }} {{ $service->model }}</td>
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
@endsection