@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body p-4 bg-white">
        <label class="window-body-form">Registrar nuevo automovil</label>
        <form action="{{ route('cars.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            @method('POST')
            <div class="col-md-6">                
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Marca
                    </div>    
                    <div class="col-md-9">
                        <div class="input-group">
                            <select class="form-select" id="select-brand" name="brand">
                                <option>- Seleccione una marca -</option>
                                @foreach ($brands as $brand)
                                    <option>{{ $brand->brand }}</option>
                                @endforeach
                            </select>                            
                            <span class="input-group-text">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createBrand">Agregar</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Modelo
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select class="form-select" id="select-model" name="model">
                                <option>- Seleccione un modelo -</option>
                            </select>
                            <span class="input-group-text">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createModel">Agregar</a>
                            </span>
                        </div>
                    </div>    
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        VIN
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="serie" placeholder="Vehicle Identification Number">
                        </div>
                    </div>    
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Año
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="year" required>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Placa
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="plate">
                    </div>
                </div>    

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Cliente
                    </div>
                    <div class="col-md-9">
                        <select id="client" class="form-select" name="client">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments"></textarea>
                    </div>                
                </div>                
            </div>
            
            <div class="col-md-6 mt-3 text-end">
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">
                    <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('modal') 
<div class="modal fade" id="createBrand" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Crear nueva marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Marca
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="new_brand">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Premium
                    </div>
                    <div class="col-md-9 pt-2">
                        <input class="form-check-input" type="checkbox" id="premium">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="newBrand">Guardar</button>
            </div>
        </div>
    </div>
</div>    

<div class="modal fade" id="createModel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Crear nuevo modelo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Marca
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="model_brand">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Modelo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="model">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="newModel">Guardar</button>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('#client').select2({
        placeholder: 'Selecciona un cliente para asignar automovil'
    });

    $('#newBrand').on('click', function(){
        const brand   = $("#new_brand").val();
        const premium = $("#premium").prop('checked');
        
        $.ajax({
            url: "{{ route('createBrand') }}",
            method: 'POST',
            data:{
                brand:brand,
                premium:premium
            },
            success:function(response){
                if (!response.success){
                    showMessageAlert('error', response.message);
                    return;
                }

                $("#select-brand").empty();
                response.data.forEach(element =>{
                    $("#select-brand").append('<option>' + element.brand + '</option');
                });

                showMessageAlert('success', response.message);
                $('#createModel').modal('hide');
            }
        });

    });

    $("#select-brand").on('change', function(){
        const brand = $("#select-brand").val();
        $("#select-model").empty();
        $("#model_brand").val(brand);

        $.ajax({
            url:"{{ route('loadModels') }}",
            method: 'POST',
            data:{
                brand:brand
            },
            success:function(response){
                response.data.forEach( model => {
                    $("#select-model").append('<option>' + model.model + '</option');
                });
            }
        });
    });        

    $('#newModel').on('click', function(){
        const brand = $("#model_brand").val();
        const model = $("#model").val();

        $.ajax ({
            url: "{{ route('createModel') }}",
            method:'POST',
            data: {
                brand:brand,
                model:model
            },
            success:function(response){
                if (!response.success){
                    showMessageAlert('error', response.message);
                    return;
                }

                $('#createModel').modal('hide');
                $("#select-model").empty();

                showMessageAlert('success', response.message);

                response.data.forEach(model => {
                    $("#select-model").append('<option>' + model.model + '</option');
                });
            }
        });
    
    });
});

function showMessageAlert(type, message){
    Swal.fire({
        text: message,
        icon: type,
        confirmButtonText: 'Aceptar'
    })
    .then(() => {
        history.go();
    });
}
</script>    
@endsection