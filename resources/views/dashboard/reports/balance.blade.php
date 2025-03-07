@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content mb-4">
    <table class="table border">
        <thead>
            <thead>
                <th>#</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th class="text-end">Ingresos</th>
                <th class="text-end">Egresos</th>
            </thead>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td></td>
                <td><strong>Servicio</strong> {{ $service->brand }} {{ $service->model }}</td>
                <td>{{ $service->due_date }}</td>
                <td class="text-end">{{ "$".number_format($service->price, 2) }}</td>
                <td></td>
            </tr>
            @endforeach
            @foreach ($salaries as $salary)
            <tr>
                <td></td>
                <td><strong>{{ $salary->type }}</strong> {{ $salary->start_date }} - {{ $salary->end_date }}</td>
                <td>{{ $salary->created_at }}</td>
                <td></td>
                <td class="text-end">{{ "$".number_format($salary->total, 2) }}</td>
            </tr>
            @endforeach
            @foreach ($expenses as $expense)
            <tr>
                <td></td>
                <td><strong>Egreso</strong> {{ $expense->name }}</td>
                <td>{{ $expense->created_at }}</td>
                <td></td>
                <td class="text-end">{{ "$".number_format($expense->price, 2) }}</td>
            </tr>
            @endforeach

            @php
                $outgoing = $expenses->sum('price') + $salaries->sum('total');
            @endphp

            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end fw-bold">{{ "$".number_format($services->sum('price'), 2) }}</td>
                    <td class="text-end fw-bold">{{ "$".number_format($outgoing, 2) }}</td>
                </tr>
            </tfoot>
        </tbody>
    </table>
</div>

<div class="main-content mb-0">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header fs-6">
                <strong>Saldo restante</strong>
            </div>
            <div class="card-body">
                {{ "$".number_format($services->sum('price') - $outgoing, 2) }}
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="row col-md-4">
        <div class="col">
            <a class="btn btn-sm btn-outline-success" id="closeFiscalMonth">
                Conciliar mes actual
            </a>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        const btnClose = document.getElementById('closeFiscalMonth');

        btnClose.addEventListener('click', (btn) => {
            btn.preventDefault();
            confirm('Estas seguro de querer conciliar mes actual');
        })
    </script>
@endsection