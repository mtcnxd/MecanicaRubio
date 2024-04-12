@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Registrar Nomina</label>
        <form action="{{ route('expenses.store') }}" method="POST" class="border pt-5 pb-4">
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
                        Sueldo
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="name" id="salary" style="text-align: right" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Horas extra
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="amount_hours" id="amount_hours" value="0">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="price_hour" id="price_hour" value="0" style="text-align: right" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Bonos
                    </div>
                    <div class="col-md-9">
                        <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="bonos" id="bonos" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descuentos
                    </div>
                    <div class="col-md-9">
                        <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>
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

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Estatus
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="status" required>
                            <option>Pendiente</option>
                            <option>Pagado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 text-end">
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancelar</a>
                <a href="#" onclick="calculate()" class="btn btn-success">
                    <x-feathericon-refresh-cw class="table-icon" style="margin: -2px 5px 2px"/>
                    Calcular
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
    var amount_hours = parseFloat( $("#amount_hours").val() );
    var salary       = parseFloat( $("#salary").val() );
    var bonos        = parseFloat( $("#bonos").val() );
    var discount     = parseFloat( $("#discount").val() );

    $("#price_hour").val( (amount_hours * 50) );

    total = salary + (amount_hours * 50) + bonos - discount;

    $("#total").val( numeral(parseFloat(total)).format('0,0.00') );
}

$("#employee").on('change', function(){
    var employee = $(this).val();

    $.ajax({
        url: "{{ route('loadEmployee') }}",
        method: 'POST',
        data: {
            employee: employee
        },
        success: function(response){
            const json = JSON.parse(response);
            $("#salary").val(json.salary);
       json.salary }
    })
});
</script>
@endsection