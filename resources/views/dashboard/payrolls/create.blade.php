@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')
        <label class="window-body-form">Nomina</label>
        <form action="{{ route('payroll.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="row">
                <div class="row col-md-6">
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

                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" disabled>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
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
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="salary" id="salary" value="" style="text-align: right" disabled>
                        </div>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
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
            </div>

            <div class="col-md-12 mt-4 mb-4 border-top border-bottom bg-body-tertiary" style="height: 300px; overflow-y: scroll">
                <table class="table table-hover table-borderless dataTable no-footer">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>Concepto</th>
                            <th class="text-end">Importe</th>
                            <th width="30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nomina</td>
                            <td class="text-end">$3000</td>
                            <td><x-feathericon-trash-2 class="table-icon"/></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Caja de ahorro</td>
                            <td class="text-end">$50</td>
                            <td><x-feathericon-trash-2 class="table-icon"/></td>
                        </tr>
                    </tbody>
                    <tfoot class="border-top">
                        <tr>
                            <td></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createItem" id="add-concept">
                                    Agregar
                                    <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                                </a>
                            </td>
                            <td class="text-end">
                                {{ '$'.number_format('0.0', 2) }}
                                <input type="hidden" name="total">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12 text-end mt-3 pe-5">
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
            </div>
        </form>
    </div>
</div>

<div id="popup">
    <div class="row">
        <label for="hours">Concepto</label>
        <select name="" id="" class="form-select">
            <optgroup label="Prestaciones">
                <option value="">Caja de ahorro</option>
                <option value="">Prestamo de nomina</option>
            </optgroup>
            <optgroup label="Descuentos">
                <option value="">Descuento por prestamo</option>
            </optgroup>
        </select>
    </div>
    <div class="row mt-3">
        <label for="hours">Importe</label>
        <input type="text" class="form-control" id="hours" name="hours">
    </div>
    <hr>
    <button class="btn btn-sm btn-secondary" id="closePopup">Agregar</button>
</div>
<div id="overlay"></div>

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

const addConcept = document.getElementById('add-concept');

addConcept.addEventListener('click', function(btn){
    btn.preventDefault();
    console.log('click');
    $('#popup').fadeIn(); // Muestra el popup
    $('#overlay').fadeIn(); // Muestra el fondo oscuro
});

// Cerrar el popup al hacer clic en el botón de cerrar
$('#closePopup').click(function() {
    $('#popup').fadeOut(); // Oculta el popup
    $('#overlay').fadeOut(); // Oculta el fondo oscuro
});

// Cerrar el popup al hacer clic fuera del popup
$('#overlay').click(function() {
    $('#popup').fadeOut(); // Oculta el popup
    $('#overlay').fadeOut(); // Oculta el fondo oscuro
});

</script>
@endsection

@section('css')
<style>
    #popup {
        display: none; /* Oculta el popup inicialmente */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 450px;
        padding: 30px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 1000;
        border-radius: 7px;
    }

    #overlay {
        display: none; /* Oculta el fondo inicialmente */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>
@endsection