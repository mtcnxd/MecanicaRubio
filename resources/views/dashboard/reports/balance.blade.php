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
            @foreach ($rows as $key => $row)
                <tr>
                    <td>{{ $key = $key +1 }}</td>
                    <td><strong>{{ $row->type }}</strong> {{ $row->concept }}</td>
                    <td>{{ Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>
                    <td class="text-end">{{ "$".number_format($row->cash_in, 2) }}</td>    
                    <td class="text-end">{{ "$".number_format($row->cash_out, 2) }}</td>
                </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end fw-bold">{{ "$".number_format($rows->sum('cash_in'), 2) }}</td>
                    <td class="text-end fw-bold">{{ "$".number_format($rows->sum('cash_out'), 2) }}</td>
                    <input type="hidden" id="income" value="{{ $rows->sum('cash_in') }}">
                    <input type="hidden" id="expenses" value="{{ $rows->sum('cash_out') }}">
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
                    {{ "$".number_format(($latest->income - $latest->expenses ), 2) }}
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
                        $balance = 0;
                        $balance = $rows->sum('cash_in') - $rows->sum('cash_out');
                    @endphp
                    {{ "$".number_format($balance, 2) }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header fs-6">
                    <strong>Saldo nuevo</strong>
                </div>
                <div class="card-body">
                    {{ "$".number_format($latest->income + $balance, 2) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="row col-md-4">
        <div class="col">
            <a class="btn btn-sm btn-outline-success" id="print" onclick="downloadPDF()">
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

});

function downloadPDF(){
    $.ajax({
        url: "{{ route('finance.createBalancePDF') }}",
        method:'POST',
        data:{},
        xhrFields: {
            responseType: 'blob' // Recibir respuesta como un Blob
        },
        success: function (response){
            const blob = new Blob([response], { type: 'application/pdf' });
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = 'balance.pdf';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        },
    });
}
</script>
@endsection