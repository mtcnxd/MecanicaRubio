@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    @include('includes.div_warning')
    
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Registrar nuevo cliente</label>
        <form action="{{ route('clients.store') }}" method="POST" class="border pt-5 pb-4">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Nombre
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" id="name" required autocomplete="off">
                        <ul id="resultClientsList" style="display: none;" class="float-suggestions"></ul>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Código Postal
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="postcode" name="postcode">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Dirección
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="street">
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
                            <option> - Selecciona una colonia - </option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Ciudad
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Estado
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        RFC
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="rfc">
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
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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
                        <input type="text" class="form-control" id="textPostalCode" autocomplete="off">
                        <ul id="resultPostalList" style="display: none;" class="float-suggestions"></ul>
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
    $('#name').on('keyup', function(){
        if (this.value.length >= 5){
            $.ajax({
                url: "{{ route('clients.getClientsList') }}",
                method: "POST",
                data: {name:this.value},
                success:function (response){
                    console.log(response);
                    $("#resultClientsList").empty();
                    $("#resultClientsList").show();
                    response.data.forEach( (client) => {
                        $("#resultClientsList").append("<li>"+ client.name +"</li>");
                    })
                }
            })
        }
    });

    $("#postcode").on('focus', function(){
        ajaxRequest(this);
    })

    $("#postcode").on('keyup', function() {
        ajaxRequest(this);
    });

    $("#textPostalCode").on('keyup', function(){
        if (this.value.length > 3) {
            $.ajax({
                url:"{{ route('clients.searchByAddress') }}",
                method: 'POST',
                data:{ address:this.value },
                success: function(response){
                    $("#resultPostalList").empty();
                    $("#resultPostalList").show();
                    response.data.forEach(function(pc){
                        $("#resultPostalList").append("<li onClick='selectItem("+ pc.postalcode +")'>" + pc.postalcode +" - "+ pc.address + "</a></li>");
                    })
                }
            });
        }
    });

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

    function ajaxRequest(element){
        if (element.value.length >= 4){
            $.ajax({
                url: "{{ route('clients.searchByPostcode') }}",
                method: 'POST',
                data: {
                    postcode:element.value
                },
                success: function(response){
                    $("#address").empty();

                    console.log(response);

                    response.data.forEach(element => {
                        $("#address").append('<option>' + element.address + '</option>');
                        $("#city").val(element.city);
                        $("#state").val(element.state);
                    });
                }
            });
        }
    }

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