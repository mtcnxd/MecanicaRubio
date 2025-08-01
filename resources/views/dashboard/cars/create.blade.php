@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="col-md-7">
        <h6 class="window-title-bar text-uppercase fw-bold">automovil</h6>
        <div class="window-body shadow p-4 bg-white">
            <label class="window-body-form">Nuevo automovil</label>
            <form action="{{ route('cars.store') }}" method="POST" class="col-md-12 border pt-4 pb-4">
                @method('POST')
                @csrf
                <div class="pt-0 p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select-brand">Marca</label>    
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
                        <div class="col-md-12">
                            <label for="select-model">Modelo</label>
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
                        <div class="col-md-12">
                            <label>VIN</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="serie" placeholder="Vehicle Identification Number">
                            </div>
                        </div>    
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Año</label>
                            <input type="text" class="form-control" name="year" required>
                        </div>
                        <div class="col-md-6">
                            <label>Placa</label>
                            <input type="text" class="form-control" name="plate">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Cliente</label>
                            <select id="client" class="form-select" name="client">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Comentarios</label>
                            <textarea class="form-control" cols="30" rows="4" name="comments"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('cars.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-sm btn-success">
                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="newBrand">Guardar</button>
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
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="newModel">Guardar</button>
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