@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Registrar Nomina</label>
        <form action="{{ route('payroll.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Empleado
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" name="employee" id="employee">
                            <option value="0"> - Seleccione empleado - </option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Movimiento
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="type" id="type">
                            <option value="0"> - Seleccione movimiento - </option>
                            <option>Nomina</option>
                            <option>Aguinaldo</option>
                            <option>Finiquito</option>
                            <option>Liquidacion</option>
                            <option>Caja de ahorro</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="salary" id="salary" value="" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Periodo
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Horas extra
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="hours" id="hours" value="0">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="hidden" name="price" id="price" value="">
                            <input type="text" class="form-control" name="hours_total" id="hours_total" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Bonos
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="bonds_comment" id="bonds_comment" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="bonds" id="bonds" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descuentos
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="discount_comment" id="discount_comment" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="discount" id="discount" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Total
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="name" id="total" value="0" style="text-align: right" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 text-end">
                <a href="{{ route('payroll.index') }}" class="btn btn-secondary">Cancelar</a>
                <a href="#" onclick="calculate()" class="btn btn-secondary">
                    <x-feathericon-refresh-cw class="table-icon" style="margin: -2px 5px 2px"/>
                    Calcular
                </a>
                <a href="#" onclick="print()" class="btn btn-secondary">
                    <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                    Imprimir
                </a>
                <button type="submit" class="btn btn-success">
                    <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
function calculate(){
    var hours    = parseFloat( $("#hours").val() );
    var price    = parseFloat( $("#price").val() );
    var salary   = parseFloat( $("#salary").val() );
    var bonds    = parseFloat( $("#bonds").val() );
    var discount = parseFloat( $("#discount").val() );

    var extra    = hours * price;

    $("#hours_total").val(extra);

    total = salary + extra + bonds - discount;

    $("#total").val( numeral(parseFloat(total)).format('0,0.00') );
}

$("#employee").on('change', function(){
    var employee = $(this).val();

    $.ajax({
        url: "/api/loadEmployee",
        method: 'POST',
        data: {
            employee: employee
        },
        success: function(response){
            $("#salary").val(response.data.salary);
            $("#price").val(response.data.extra);
        }
    })
});
</script>
@endsection