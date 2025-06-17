@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Servicio</label>
        <form action="" method="POST" class="border pt-5 pb-4">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Cliente
                    </div>    
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="client" value="{{ isset($client) ? $client->name : 'Not configured' }}">
                        <input type="hidden" value="" id="service">
                    </div>
                </div>

                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Automovil
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="car" name="car" value="">
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Servicio/Fallo reportado
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="fault"></textarea>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4 mb-4 border-top border-bottom bg-body-tertiary" style="height: 300px; overflow-y: scroll">
                <table class="table table-hover table-borderless dataTable no-footer">
                    <thead>
                        <th width="30px">#</th>
                        <th>Descripción</th>
                        <th class="text-end">P.Unitario</th>
                        <th class="text-end">Importe</th>
                        <th width="30px"></th>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    <tfoot class="border-top">
                        <tr>
                            <td></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createItem" id="addItem">
                                    Agregar
                                    <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                                </a>
                            </td>
                            <td></td>
                            <td class="text-end">
                                <input type="hidden" name="total" value="">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12 text-end mt-3 pe-5">
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Atras</a>
                    <a href="#" class="btn btn-secondary" onclick="downloadPDF(1)">
                        <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                        Imprimir
                    </a>
                    <a href="" class="btn btn-secondary">
                        <x-feathericon-share-2 class="table-icon" style="margin: -2px 5px 2px"/>
                        Enviar
                    </a>
                    <!--
                    <button type="submit" class="btn btn-success">
                        <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                        Guardar
                    </button>
                    -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="createItem" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Crear nueva marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Cantidad
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="amount">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descripción
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="item" autocomplete="off">
                        <ul id="resultListItems" style="display:none; z-index:10;" class="float-suggestions"></ul>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Proveedor
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="supplier">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Precio
                    </div>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 pt-2">
                        &nbsp;
                    </div>
                    <div class="col-md-9">
                        <input class="form-check-input" type="checkbox" id="labour">
                        <label class="form-check-label" for="labour">
                            Mano de obra
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="addItemInvoice">Agregar</button>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script>
    $("#item").on('keyup', function(){
        if (this.value.length >= 5){
            $.ajax({
                url: "{{ route('services.getServiceItems') }}",
                method: "POST",
                data: {text:this.value},
                success:function (response){                    
                    console.log(response);

                    $("#resultListItems").empty();
                    $("#resultListItems").show();
                    response.data.forEach( (item) => {
                        $("#resultListItems").append("<li onClick='selectItem(this)'>"+ item.item +"</li>");
                    })
                }
            });
        }
    });
</script>
@endsection