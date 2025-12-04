<h2>Ingenieria Mecanica Rubio | Nomina # {{ $payroll->id }}</h2>

<p>Este correo es una copia del recibo de nomina</p>

<p>
    <span style="font-weight: bold">Nombre:</span> 
    {{ $payroll->employee->name }}
</p>

<h3>Periodo de Pago</h3>
<div style="display: flex; content-justify: space-between;">
    <div>
        <span style="font-weight: bold">Fecha inicio:</span> 
        {{ $payroll->start_date }}
    </div>
    <div>
        <span style="font-weight: bold">Fecha final:</span>
        {{ $payroll->end_date }}
    </div>
</div>

<h3>Desgloce de conceptos</h3>
<div style="width: 90%">
    <table style="width: 100%">
        <thead>
            <tr style="font-weight: bold;">
                <td>Concepto</td>
                <td>Importe</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($payroll->payrollItems as $item)
                <tr>
                    <td>{{ $item->concept }}</td>
                    <td>{{ Number::currency($item->amount) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">{{ Number::currency($payroll->total) }}</td>
            </tr>
        </tfoot>
    </table>
</div>