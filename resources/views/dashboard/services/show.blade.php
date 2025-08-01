@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <h6 class="window-title-bar text-uppercase fw-bold">Servicio #{{ $service->id }}</h6>
    <div class="window-body shadow p-4 bg-white">
        <label class="window-body-form">Servicio</label>
        <form action="{{ route('services.update', $service->id) }}" method="POST" class="border pt-4 pb-4">
            @csrf
            @method('PATCH')
            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Cliente</label>
                            <div class="input-group">
                                <input type="hidden" value="{{ $service->id }}" id="service">
                                <input type="text" class="form-control" name="client" value="#{{ $service->client->id }} - {{ $service->client->name }}" disabled>
                                <span class="input-group-text">
                                    <a href="{{ route('clients.edit', $service->client->id) }}">Editar</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Automovil</label>
                            <input type="text" class="form-control" id="car" name="car" value="{{ $service->car->brand }} {{ $service->car->model }} - {{ $service->car->year }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label>Odometro</label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="odometer" value="{{ $service->odometer }}">
                                <span class="input-group-text">Km</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Servicio/Fallo reportado</label>
                            <textarea class="form-control" cols="30" rows="4" name="fault" disabled>{{ $service->fault }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Entrada</label>    
                            <input type="date" class="form-control" name="entry" value="{{ date('Y-m-d', strtotime($service->entry_date)) }}">
                        </div>
                        <div class="col-md-6">
                            <label>Salida</label>    
                            @if (isset($service->due_date))
                                <input type="date" class="form-control" name="client" value="{{ date('Y-m-d', strtotime($service->due_date)) }}" disabled>
                            @else 
                                <input type="date" class="form-control" name="client" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Días transcurridos</label>    
                            @if ($service->status == 'Entregado')
                                @php
                                $elapsed = $service->created_at->diffInDays($service->due_date);
                                @endphp
                                <input type="text" class="form-control" name="client" value="{{ $elapsed }}" disabled>
                            @else
                                @php
                                $elapsed = $service->created_at->diffInDays(Carbon\Carbon::now());
                                @endphp
                                <input type="text" class="form-control {{($elapsed >= 4) ? 'is-invalid' : '' }}" name="client" value="{{ $elapsed }}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Comentarios</label>
                            <textarea class="form-control" cols="30" rows="4" name="comments" disabled>{{ $service->comments }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 border-top border-bottom bg-body-tertiary mt-4 mb-4" style="height: 350px; overflow-y: scroll">
                <table class="table table-hover table-borderless dataTable no-footer">
                    <thead>
                        <th width="30px">#</th>
                        <th>Descripción</th>
                        <th class="text-end">P.Unitario</th>
                        <th class="text-end">Importe</th>
                        <th width="30px"></th>
                    </thead>
                    <tbody>
                        @php
                            $grandTotal = 0;
                        @endphp                        
                        @foreach ($service->invoiceItems as $item)
                        @php
                            $grandTotal += $item->amount * $item->price;
                        @endphp
                        <tr>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->item }}</td>
                            <td class="text-end">{{ '$'.number_format($item->price,2) }}</td>
                            <td class="text-end">{{ '$'.number_format($item->amount * $item->price, 2) }}</td>
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
                            <td colspan="3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createItem" id="addItem">
                                    Agregar
                                    <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                                </a>
                            </td>
                            <td class="text-end fw-bold">
                                {{ '$'.number_format($grandTotal, 2) }}
                                <input type="hidden" name="total" value="{{ $grandTotal }}">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-6">
                    <label>Comentarios</label>
                    <textarea name="notes" class="form-control" cols="30" rows="3">{{ $service->notes }}</textarea>
                </div>
                <div class="col-md-6">
                    <label>Estatus</label>
                    <select class="form-select" name="status">
                        <option {{$service->status == "Cancelado" ? 'selected' : '' }}>Cancelado</option>
                        <option {{$service->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option {{$service->status == 'Esperando cliente' ? 'selected' : '' }}>Esperando cliente</option>
                        <option {{$service->status == 'Esperando refaccion' ? 'selected' : '' }}>Esperando refaccion</option>
                        <option {{$service->status == 'Finalizado' ? 'selected' : '' }} value="Finalizado">Finalizado [NO PAGADO]</option>
                        <option {{$service->status == 'Entregado' ? 'selected' : '' }} value="Entregado">Entregado [PAGADO]</option>
                    </select>
                </div>
            </div>

            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-12 text-end">
                    <a href="{{ route('services.index') }}" class="btn btn-sm btn-secondary">Atras</a>
                    <a href="#" class="btn btn-sm btn-secondary" onclick="downloadPDF({{ $service->id }})">
                        <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                        Imprimir
                    </a>
                    <a href="{{ route('sendEmailInvoice', $service->id) }}" class="btn btn-sm btn-secondary">
                        <x-feathericon-share-2 class="table-icon" style="margin: -2px 5px 2px"/>
                        Enviar
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
@endsection

@section('modal')
<div class="modal modal-xl fade" id="createItem" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar elemento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <label for="amount">Cantidad</label>
                        <input type="text" class="form-control" id="amount">
                    </div>
                    <div class="col-md-5">
                        <label for="item">Descripción</label>
                        <input type="text" class="form-control" id="item" autocomplete="off">
                        <ul id="resultListItems" style="display:none; z-index:10;" class="float-suggestions"></ul>
                    </div>        
                    <div class="col-md-3">
                        <label for="supplier">Proveedor</label>
                        <input type="text" class="form-control" id="supplier">
                    </div>                    
                    <div class="col-md-2">
                        <label for="price">Precio</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input class="form-check-input" type="checkbox" id="labour">
                        <label class="form-check-label" for="labour">
                            Mano de obra
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="addItemInvoice">Agregar</button>
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
$("#labour").on('change', function(){
    if ($(this).prop('checked')) {
        $("#amount").attr('disabled','disabled');
        $("#item").attr('disabled','disabled');
        $("#supplier").attr('disabled','disabled');
    } else {
        $("#amount").removeAttr('disabled');
        $("#item").removeAttr('disabled');
        $("#supplier").removeAttr('disabled');
    }
});

$("#item").on('keyup', function(){
    if (this.value.length >= 3){
        $.ajax({
            url: "{{ route('services.getServiceItems') }}",
            method: "GET",
            data: {
                text:this.value
            },
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
    var service  = $("#service").val();
    var amount   = $("#amount").val();
    var item     = $("#item").val();
    var supplier = $("#supplier").val();
    var price    = $("#price").val();
    var labour   = $("#labour").prop('checked');

    if (item.length < 3 && !labour) {
        $("#item").focus();
        return;
    }

    $.ajax({
        url:"{{ route('createItemInvoice') }}",
        method:'POST',
        data: {
            service:service,
            amount:amount,
            item:item,
            supplier:supplier,
            price:price,
            labour:labour
        },
        success:function(response){
            if (response.success){
                $("#createItem").modal('hide');
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

function showMessageAlert(message){
    Swal.fire({
        text: message,
        icon: 'success',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        history.go();
    });
}

function downloadPDF(serviceid){
    $.ajax({
        url: "{{ route('services.createServicePDF') }}",
        method:'POST',
        data:{
            serviceid:serviceid
        },
        xhrFields: {
            responseType: 'blob' // Recibir respuesta como un Blob
        },
        success: function (response){
            console.log(response)

            const blob = new Blob([response], { type: 'application/pdf' });
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = 'invoice.pdf';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        },
    });
}

</script>    
@endsection