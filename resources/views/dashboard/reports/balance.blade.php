@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content mb-4">
    <table class="table border table-hover">
        <thead>
            <thead>
                <th width="40px">#</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th class="text-end">Ingresos</th>
                <th class="text-end">Egresos</th>
            </thead>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($services as $service)
            <tr>
                <td>{{ $count++ }}</td>
                <td><strong>Servicio</strong> {{ $service->brand }} {{ $service->model }}</td>
                <td>{{ $service->due_date }}</td>
                <td class="text-end">{{ "$".number_format($service->price, 2) }}</td>
                <td></td>
            </tr>
            @endforeach
            @foreach ($salaries as $salary)
            <tr>
                <td>{{ $count++ }}</td>
                <td><strong>{{ $salary->type }}</strong> {{ $salary->start_date }} - {{ $salary->end_date }}</td>
                <td>{{ $salary->created_at }}</td>
                <td></td>
                <td class="text-end">{{ "$".number_format($salary->total, 2) }}</td>
            </tr>
            @endforeach
            @foreach ($expenses as $expense)
            <tr>
                <td>{{ $count++ }}</td>
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
                    <input type="hidden" id="income" value="{{ $services->sum('price') }}">
                    <td class="text-end fw-bold">{{ "$".number_format($outgoing, 2) }}</td>
                    <input type="hidden" id="expenses" value="{{ $outgoing }}">
                </tr>
            </tfoot>
        </tbody>
    </table>
</div>

<div class="main-content mb-0">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header fs-6">
                    <strong>Saldo anterior</strong>
                </div>
                <div class="card-body">
                    {{ "$".number_format($lastBalance->income, 2) }}
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card">
                <div class="card-header fs-6">
                    <strong>Saldo actual <span class="fs-8 text-muted">(Ingresos-Egresos)</span></strong>
                </div>
                <div class="card-body">
                    @php
                        $currentBalance = $services->sum('price') - $outgoing;
                    @endphp
                    {{ "$".number_format($currentBalance, 2) }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header fs-6">
                    <strong>Saldo nuevo</strong>
                </div>
                <div class="card-body">
                    {{ "$".number_format($lastBalance->income + $currentBalance, 2) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="row col-md-4">
        <div class="col">
            <a class="btn btn-sm btn-outline-success" id="print">
                Imprimir
            </a>

            <a class="btn btn-sm btn-outline-success" id="closeMonth">
                Conciliar mes actual
            </a>
            <img src="{{ asset('image.gif') }}" width="20px" height="20px" style="display:none;" class="ms-2" id="loader">
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        const btnClose = document.getElementById('closeMonth');

        btnClose.addEventListener('click', (btn) => {
            btn.preventDefault();
            let income   = document.getElementById('income').value;
            let expenses = document.getElementById('expenses').value;

            if (
                confirm('¿Confirmas que deseas cerrar el mes actual?')
            ){
                $("#loader").show();
                $.ajax({
                    url: "{{ route('finance.closeMonth') }}",
                    method: 'POST',
                    data: {
                        income:income,
                        expenses:expenses
                    },
                    success: function(response){
                        console.log(response);
                    }
                })
                .then(() => {
                    $("#loader").hide();
                });
            }

        })
    </script>
@endsection