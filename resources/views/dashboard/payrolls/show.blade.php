@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')
        <label class="window-body-form">Nomina</label>
        <form action="{{ route('payroll.update', 1) }}" method="POST" class="border pt-5 pb-4">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Empleado
                    </div>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <input type="text" name="" id="" class="form-control" value="{{ $salary->name }}" disabled>
                            <span class="input-group-text" id="basic-addon2">
                                <x-feathericon-user class="table-icon" style="margin: -2px 5px 2px"/>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" id="email" value="{{ $salary->email }}" disabled>
                            <span class="input-group-text" id="basic-addon2">
                                <x-feathericon-mail class="table-icon" style="margin: -2px 5px 2px"/>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Movimiento
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="" id="" class="form-control" value="{{ $salary->type }}" disabled>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Fecha de dispersión
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="" id="" class="form-control" value="{{ $salary->paid_date }}" disabled>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Periodo
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control" value="{{ $salary->start_date }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end_date" class="form-control" value="{{ $salary->end_date }}" disabled>
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
                        @foreach ($details as $count => $item)
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
                                {{ '$'.number_format($details->sum('amount'), 2) }}
                                <input type="hidden" name="total" value="{{ $details->sum('amount') }}" id="total">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12 text-end mt-3 pe-5">
                    <a href="{{ route('payroll.index') }}" class="btn btn-secondary">Atras</a>
                    <a href="#" onclick="print()" class="btn btn-secondary">
                        Imprimir
                        <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                    </a>
                    <button type="submit" class="btn btn-success">
                        Pagar
                        <x-feathericon-dollar-sign class="table-icon" style="margin: -2px 5px 2px"/>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="popup">
    <div class="row">
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
    <div class="row mt-3">
        <label for="amount">Importe</label>
        <input type="text" class="form-control" id="amount" name="amount">
    </div>
    <div class="row mt-3">
        <button class="col btn btn-secondary m-1" onclick="closePopup()">Cancelar</button>
        <button class="col btn btn-success m-1" id="acceptPopup">Agregar</button>
    </div>
</div>
<div id="overlay"></div>
@endsection

@section('js')
<script>
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