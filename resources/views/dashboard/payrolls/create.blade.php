@extends('includes.body')

@section('content')
<div class="main-content shadow">
    <h6 class="title-bar text-uppercase fw-bold">Nominas</h6>
    <div class="window-body p-4 bg-white">
        @include('includes.alert')
        <label class="window-body-form">Nomina</label>
        <form action="{{ route('payroll.store') }}" method="POST" class="border pt-4 pb-4">
            @csrf
            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Empleado</label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="employee" id="employee" required>
                                    <option value="0"> - Seleccione empleado - </option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-text" id="basic-addon2">
                                    <x-feathericon-user class="table-icon" style="margin: -2px 5px 2px"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Movimiento</label>
                            <select class="form-select" name="type" id="type">
                                <option value="0"> - Seleccione movimiento - </option>
                                <option>Nomina</option>
                                <option>Aguinaldo</option>
                                <option>Finiquito</option>
                                <option>Liquidacion</option>
                                <option>Otras percepciones</option>
                            </select>
                        </div> 
                        <div class="col-md-6">
                            <label>Salario</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="salary" id="salary" value="" style="text-align: right" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Correo</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="email" id="email" disabled>
                                <span class="input-group-text" id="basic-addon2">
                                    <x-feathericon-mail class="table-icon" style="margin: -2px 5px 2px"/>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Inicio</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Final</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 border-top border-bottom bg-body-tertiary mt-4 mb-4" style="height: 300px; overflow-y: scroll">
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
                        @foreach ($items as $count => $item)
                        <tr>
                            <td>{{ $count +1 }}</td>
                            <td>{{ $item->concept }}</td>
                            <td class="text-end">{{ "$".number_format($item->amount, 2) }}</td>
                            <td>
                                <a href="#" class="removeItem" id="{{ $item->id }}">
                                    <x-feathericon-trash-2 class="table-icon"/>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="border-top">
                        <tr>
                            <td></td>
                            <td>
                                <a href="#" id="addConcept">
                                    Agregar
                                    <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                                </a>
                            </td>
                            <td class="text-end">
                                {{ '$'.number_format($items->sum('amount'), 2) }}
                                <input type="hidden" name="total" value="{{ $items->sum('amount') }}" id="total">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-12 text-end">
                    <a href="{{ route('payroll.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
                    <a href="#" onclick="print()" class="btn btn-sm btn-secondary">
                        <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                        Imprimir
                    </a>
                    <button type="submit" class="btn btn-sm btn-success">
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
        <div class="col">
            <label for="concept">Concepto</label>
            <select name="concept" id="concept" class="form-select">
                <optgroup label="Prestaciones">
                    <option>Salario</option>
                    <option>Caja de ahorro</option>
                    <option>Prestamo de nomina</option>
                    <option>Hora Extra</option>
                    <option>Bono adicional</option>
                    <option>Prima Vacacional</option>
                </optgroup>
                <optgroup label="Descuentos">
                    <option>Descuento</option>
                    <option>Descuento por prestamo</option>
                </optgroup>
            </select>
        </div>
    
        <div class="col">
            <label for="amount">Importe</label>
            <input type="text" class="form-control" id="amount" name="amount">
        </div>
    </div>
    
    <div class="row mt-3">
        <button class="col btn btn-secondary m-1" onclick="closePopup()">Cancelar</button>
        <button class="col btn btn-success m-1" id="acceptPopup">Agregar</button>
    </div>
</div>
<div id="overlay"></div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
$("#employee").on('change', function(){
    var employee = $(this).val();

    $.ajax({
        url: "{{ route('employees.load') }}",
        method: 'POST',
        data: {employee: employee},
        success: function(response){
            $("#salary").val(response.data.salary);
            $("#email").val(response.data.email);
        }
    })
});

const addConcept = document.getElementById('addConcept');

addConcept.addEventListener('click', function(btn){
    btn.preventDefault();
    $('#popup').fadeIn();
    $('#overlay').fadeIn();
});

$(".removeItem").on('click', function(btn) {
    let itemId = this.id;

    $.ajax({
        url: "{{ route('payroll.removeItem') }}",
        data: {itemId:itemId},
        method:'POST',
        success: function (response) {
            console.log(response)
        }
    })
    .then(() => {
        history.go();
    });
});

$('#acceptPopup').click(function() {
    $.ajax({
        url: "{{ route('payroll.addItem') }}",
        method: 'POST',
        data: {
            concept: $("#concept").val(),
            amount: $("#amount").val()
        },
        success: function(response){
            console.log(response);
        }
    })
    .then(() => {
        history.go();
    });

    closePopup();
});

$('#overlay').click(function() {
    closePopup();
});

function closePopup(){
    $('#popup').fadeOut();
    $('#overlay').fadeOut();
}
</script>
@endsection

@section('css')
<style>
    #popup {
        display: none; /* Oculta el popup inicialmente */
        width: 600px !important;
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