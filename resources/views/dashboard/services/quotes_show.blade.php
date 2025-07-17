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
        <label class="window-body-form">Cotizacion</label>
        <form action="{{ route('quotes.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="row">
                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Cliente
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="client" value="{{ $quote->client_name }}" disabled>
                        <input type="hidden" value="{{ $quote->id }}" id="quoteId">
                    </div>
                </div>

                <div class="row col-md-6">
                    <div class="col-md-3 pt-2 text-end">
                        Automovil
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-select" id="car" name="car" value="{{ $quote->car_name }}" disabled>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Servicio/Fallo reportado
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="fault" disabled>{{ $quote->fault_reported }}</textarea>
                    </div>
                </div>

                <div class="row col-md-6 mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments" disabled>{{ $quote->comments }}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4 mb-4 border-top border-bottom bg-body-tertiary" style="height: 350px; overflow-y: scroll">
                <table class="table table-hover table-borderless dataTable no-footer">
                    <thead>
                        <th width="30px">#</th>
                        <th>Descripción</th>
                        <th class="text-end">P.Unitario</th>
                        <th width="200px" class="text-end">Importe</th>
                        <th width="30px"></th>
                    </thead>
                    <tbody>
                        @foreach ($quoteItems as $item)
                            <tr>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->item }}</td>
                                <td class="text-end">{{ '$'.number_format($item->price, 2) }}</td>
                                <td class="text-end">{{ '$'.number_format($item->amount * $item->price, 2) }}</td>
                                <td>
                                    <a href="#" class="removeItemFromList" data-id="{{ $item->id }}">
                                        <x-feathericon-trash-2 class="table-icon"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="border-top">
                        <tr>
                            <td colspan="3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createItem" id="addItem">
                                    Agregar
                                    <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                                </a>
                            </td>
                            <td class="text-end">
                                {{ "$".number_format($quoteItems->sum('price'), 2) }}
                                <input type="hidden" name="total" value="{{ $quoteItems->sum('price') }}">
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
                    <button type="submit" class="btn btn-secondary">
                        <x-feathericon-share-2 class="table-icon" style="margin: -2px 5px 2px"/>
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('modal')
<div class="modal modal-lg fade" id="createItem" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar elemento a cotizacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <label for="amount" class="mb-2">Cantidad</label>
                        <input type="text" class="form-control" id="amount">
                    </div>
                    <div class="col-md-7">
                        <label for="item" class="mb-2">Descripción</label>
                        <input type="text" class="form-control" id="item" autocomplete="off">
                        <ul id="resultListItems" style="display:none; z-index:10;" class="float-suggestions"></ul>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="mb-2">Precio</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" class="mb-2">
                        <input class="form-check-input" type="checkbox" id="labour">
                        <label class="form-check-label" for="labour">Mano de obra</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="addItemToList">Agregar</button>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('js')
<script>
    var amount = document.getElementById('amount');
    var item   = document.getElementById('item');
    var price  = document.getElementById('price');    

    $("#addItemToList").on('click', function(){
        $.ajax({
            url: "{{ route('quotes.addItemToList') }}",
            method:'POST',
            data:{
                amount:amount.value,
                item:item.value,
                price:price.value
            },
            success: function(response){
                console.log(response);
            }
        }).then(function(){
            location.reload();
        });
    });

    $(".removeItemFromList").on('click', function(event){
        event.preventDefault();
        var elementId = $(this).data('id');
        console.log( elementId );

        $.ajax({
            url: "{{ route('quotes.remItemFromList') }}",
            method: 'POST',
            data: {
                itemId: elementId
            },
            success: function(response){
                console.log(response);
            }
        })
        .then(function(){
            history.go(0);
        });
    });

    $("#item").on('keyup', function(){
        if (this.value.length >= 3){
            $.ajax({
                url: "{{ route('services.getServiceItems') }}",
                method: "GET",
                data: {text:this.value},
                success:function (response){                    
                    $("#resultListItems").empty();
                    $("#resultListItems").show();
                    response.data.forEach( (item) => {
                        $("#resultListItems").append("<li onClick='selectItem(this)'>"+ item +"</li>");
                    })
                }
            });
        }
    });

    function selectItem(element){
        item.value = element.textContent;
        $("#resultListItems").hide();
    }    
</script>
@endsection