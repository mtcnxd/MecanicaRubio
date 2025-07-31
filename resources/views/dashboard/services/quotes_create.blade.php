@extends('includes.body')

@section('content')
<div class="main-content shadow">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body p-4 bg-white">
        <label class="window-body-form">Cotizacion</label>
        <form action="{{ route('quotes.store') }}" method="POST" class="border pt-4 pb-4">
            @csrf
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
                        <input type="text" class="form-select" id="car" name="car">
                        <ul id="resultListCars" class="float-suggestions" style="display:none; z-index:10;">
                            @foreach ($cars as $car)
                                <li>{{ $car->brand }} {{ $car->model }}</li>
                            @endforeach
                        </ul>
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

            <div class="col-md-12 mt-4 mb-4 border-top border-bottom bg-body-tertiary" style="height: 350px; overflow-y: scroll">
                <table class="table table-hover table-borderless dataTable no-footer">
                    <thead>
                        <th width="30px">#</th>
                        <th>Descripción</th>
                        <th class="text-end">P.Unitario</th>
                        <th class="text-end">Importe</th>
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

<x-modal size="modal-lg" acceptButton="addItemInvoice">
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
</x-modal>

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script>
    $("#car").on('keyup', function(){
        if (this.value.length >= 3){
            $.ajax({
                url: "{{ route('cars.SearchCar') }}",
                method: "GET",
                data: {text:this.value},
                success:function (response){
                    console.log(response);

                    $("#resultListCars").empty();
                    $("#resultListCars").show();
                    response.data.forEach( (item) => {
                        $("#resultListCars").append("<li onClick='selectCar(this)'>"+ item.brand +" "+ item.model +"</li>");
                    })
                }
            });
        }
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

    $("#addItemInvoice").on('click', function(event){
        var amount   = $("#amount").val();
        var item     = $("#item").val();
        var price    = $("#price").val();
        var labour   = $("#labour").prop('checked');

        $.ajax({
            url:"{{ route('quotes.addItemToList') }}",
            method:'POST',
            data: {
                service:1,
                amount:amount,
                item:item,
                price:price,
                labour:labour
            },
            success:function(response){
                console.log(response);
                if (response.success){
                    location.reload();
                }
            }
        });
    });

    $(".removeItem").on('click', function (event){
        event.preventDefault();
        $.ajax({
            url:"{{ route('removeItemInvoice') }}",
            method:'POST',
            data: {
                item:this.id
            },
            success:function(response){
                showMessageAlert(response);
            }
        });
    });

    function selectItem(element){
        let input = document.getElementById('item');
        input.value = element.textContent;
        $("#resultListItems").hide();
    }

    function selectCar(element){
        let input = document.getElementById('car');
        input.value = element.textContent;
        $("#resultListCars").hide();
    }
    
</script>
@endsection