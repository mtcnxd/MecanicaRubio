@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Editar cliente</label>
        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="border pt-5 pb-4">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Nombre
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ isset($client) ? $client->name : '' }}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ isset($client) ? $client->email : '' }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="phone" value="{{ isset($client) ? $client->phone : '' }}" required>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Código Postal
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ isset($client) ? $client->postcode : '' }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Dirección
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="street" value="{{ isset($client) ? $client->street : '' }}">
                            <span class="input-group-text">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</a>
                            </span>
                          </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Colónia
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" id="address" name="address">
                            @if ( isset($client) )
                                <option>{{ $client->address }}</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Ciudad
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="city" name="city" value="{{ isset($client) ? $client->city : '' }}">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Estado
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="state" name="state" value="{{ isset($client) ? $client->state : '' }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        RFC
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="rfc" value="{{ isset($client) ? $client->rfc : '' }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments">{{ isset($client) ? $client->comments : '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="col-md-3 mt-3">
                        <button type="button" href="#" class="btn btn-danger" id="deleteClient" data-bs-client="{{ isset($client) ? $client->id : ''}}">Eliminar</button>
                    </div>
                    <div class="col-md-6 mt-3 text-end">
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">
                            <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Buscar codigo postal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Colonia
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="textPostalCode">
                        <ul id="resultList">
                            <li>Results</li>
                        </ul>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#deleteClient").on('click', function(btn){
        var client = $(this).data('bsClient');

        $.ajax({
            url: "{{ route('deleteClient') }}",
            method: 'POST',
            data: {
                client:client
            },
            success: function(response){
                showMessageAlert(response);
            }
        });
    });

    $("#postcode").on('keyup', function() {
        var postcode = this.value;

        if (postcode.length >= 4){
            $.ajax({
                url: "{{ route('searchPostcode') }}",
                method: 'POST',
                data: {
                    postcode:postcode
                },
                success: function(response){
                    $("#address").empty();
                    const object = JSON.parse(response);

                    object.forEach(element => {
                        $("#address").append('<option>' + element.address + '</option>');
                        $("#city").val(element.city);
                        $("#state").val(element.state);
                    });

                }
            });
        }
    });

    $("#textPostalCode").on('keyup', function(){
        var address = this.value;
        if (address.length > 3) {
            $.ajax({
                url:"{{ route('searchPostalCode') }}",
                method: 'POST',
                data:{
                    address:address
                },
                success: function(response){
                    const postalCodes = JSON.parse(response);
                    $("#resultList").empty();
                    $("#resultList").show();
                    $.each(postalCodes, function(index, pc){
                        $("#resultList").append("<li onClick='selectItem("+ pc.postalcode +")'>" + pc.postalcode +" - "+ pc.address + "</a></li>");
                    })
                }
            });
        }
    });

    function selectItem(postalcode){
        $("#searchModal").modal('hide');
        $("#postcode").val(postalcode);
        $("#postcode").focus();
    };

    function showMessageAlert(message){
        Swal.fire({
            text: message,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            location.replace('/clients');
        });
    }
</script>
@endsection