@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')
        <label class="window-body-form">Servicios</label>
        <form action="{{ route('services.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Cliente
                    </div>    
                    <div class="col-md-9">
                        <div class="input-group">
                            <select class="form-select" id="select-client" name="client" required>
                                <option value="">- Seleccione un cliente -</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Automóvil
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="car" name="car">
                            <option>- Seleccione un automovil -</option>
                        </select>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Odómetro
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                        <input type="text" class="form-control" name="odometer">
                            <span class="input-group-text">Km</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Servicio/Fallo reportado
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="fault" required></textarea>
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
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">
                    <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                    Guardar
                </button>
            </div>
        </form>
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
    $("#select-client").select2();

    const select_cars = $("#car");
    $("#select-client").on('change', function(){
        const client = this.value

        $.ajax({
            url: "{{ route('carsByClient') }}",
            method: 'POST',
            data: {
                client
            },
            success:function(response){
                const object = JSON.parse(response);
                select_cars.empty();
                object.forEach(car => {
                    select_cars.append('<option value="'+ car.id +'">'+ car.brand +' '+ car.model +'</option>');
                });
            }
        });
    });

});

function showMessageAlert(){
    Swal.fire({
        text: 'Los datos se guardaron correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })
}
</script>    
@endsection
