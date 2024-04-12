@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Detalles del Servicio</label>
        <form action="{{ route('services.update', $service->id) }}" method="POST" class="border pt-5 pb-4">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6" style="padding-right: 40px;">         
                    <div class="row">
                        <div class="col-md-3 pt-2 text-end">
                            Cliente
                        </div>    
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="client" value="{{ $service->name }}" disabled>
                            <input type="hidden" value="{{ $service->id }}" id="service">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Automovil
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="car" name="car" value="{{ $service->brand }} {{ $service->model }}" disabled>
                        </div>
                        <div class="col-md-3 pt-2 text-end">
                            Odometro
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                            <input type="text" class="form-control" name="odometer" value="{{ number_format($service->odometer,0,',') }}" disabled>
                                <span class="input-group-text">Km</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Servicio/Fallo reportado
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" cols="30" rows="4" name="fault" disabled>{{ $service->fault }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="padding-right: 40px;">
                    <div class="row">
                        <div class="col-md-3 pt-2 text-end">
                            Ingresó
                        </div>    
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="client" value="{{ date('d-m-Y', strtotime($service->created_at)) }}" disabled>
                        </div>
                        <div class="col-md-3 pt-2 text-end">
                            Días transcurridos
                        </div>    
                        <div class="col-md-3">
                            @if ($service->status == 'Entregado')
                                @php
                                $elapsed = Carbon\Carbon::parse($service->created_at)->diffInDays(Carbon\Carbon::parse($service->due_date));
                                @endphp
                                <input type="text" class="form-control" name="client" value="{{ $elapsed }}" disabled>
                            @else
                                @php
                                $elapsed = Carbon\Carbon::parse($service->created_at)->diffInDays(Carbon\Carbon::now());
                                @endphp
                                <input type="text" class="form-control {{($elapsed >= 4) ? 'is-invalid' : '' }}" name="client" value="{{ $elapsed }}" disabled>
                            @endif
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Entrega
                        </div>    
                        <div class="col-md-3">
                            @if (isset($service->due_date))
                                <input type="text" class="form-control" name="client" value="{{ date('d-m-Y', strtotime($service->due_date)) }}" disabled>
                            @else 
                                <input type="text" class="form-control" name="client" disabled>
                            @endif
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Comentarios
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" cols="30" rows="4" name="comments" disabled>{{ $service->comments }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="col-md-12 p-4 pb-2">
                <h5>
                    Lista de materiales
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createItem" id="addItem">
                        <x-feathericon-plus-circle class="table-icon" style="margin: 0 0 2px 5px"/>
                    </a>
                </h5>
                <table class="table table-hover" id="table-items">
                    <thead>
                        <th width="20px">&nbsp;</th>
                        <th>Cant</th>
                        <th>Descripción</th>
                        <th class="text-end">P.Unitario</th>
                        <th class="text-end">Importe</th>
                    </thead>
                    <tbody>
                        @php
                            $total_invoice = 0;
                        @endphp
                        @foreach ($items as $item)
                        @php
                            $total_invoice += $item->amount * $item->price;
                        @endphp
                        <tr>
                            <td>
                                <a href="#" class="removeItem" id="{{ $item->id }}">
                                    <x-feathericon-trash-2 class="table-icon"/>
                                </a>
                            </td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <a href="#">
                                    {{ $item->item }}
                                </a>
                            </td>
                            <td class="text-end">{{ '$'.number_format($item->price,2) }}</td>
                            <td class="text-end">{{ '$'.number_format($item->amount * $item->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="col-md-12 fs-5 text-end" style="padding-right: 10px;"> 
                    {{ '$'.number_format($total_invoice, 2) }}
                    <input type="hidden" name="total" value="{{ $total_invoice }}">
                </div>
            </div>

            <div class="col-md-12 p-4 pt-2 pb-0">
                Comentarios
            </div>

            <div class="col-md-12 p-4 pt-2 pb-0">
                <textarea name="notes" class="form-control" cols="30" rows="3">{{ $service->notes }}</textarea>
            </div>

            <div class="row p-4 pt-3" style="display: flex; align-items: flex-end">
                <div class="col-md-6">
                    <div class="col-md-3">
                        Estatus
                    </div>
                    <div class="col-md-3 pt-2">
                        <select class="form-select" name="status">
                            <option {{$service->status == "Cancelado" ? 'selected' : '' }}>Cancelado</option>
                            <option {{$service->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option {{$service->status == 'Esperando cliente' ? 'selected' : '' }}>Esperando cliente</option>
                            <option {{$service->status == 'Esperando refaccion' ? 'selected' : '' }}>Esperando refaccion</option>
                            <option {{$service->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            <option {{$service->status == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancelar</a>
                    <a href="#" class="btn btn-secondary">
                        <x-feathericon-printer class="table-icon" style="margin: -2px 5px 2px"/>
                        Imprimir
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">
                        <x-feathericon-file-text class="table-icon" style="margin: -2px 5px 2px"/>
                        Facturar
                    </a>
                    <button type="submit" class="btn btn-success">
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
                        <input type="text" class="form-control" id="item">
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
                            <input type="text" class="form-control" id="price">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$("#addItemInvoice").on('click', function(event){
    var service  = $("#service").val();
    var amount   = $("#amount").val();
    var item     = $("#item").val();
    var supplier = $("#supplier").val();
    var price    = $("#price").val();
    var labour   = $("#labour").prop('checked');

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
            $("#createItem").modal('hide');
            var tbody = $("#table-items tbody");
            var object = JSON.parse(response);
            history.go();
        }
    });
});

$(".removeItem").on('click', function (event){
    event.preventDefault();
    const service = $("#service").val();
    const item = this.id;
    
    $.ajax({
        url:"{{ route('removeItemInvoice') }}",
        method:'POST',
        data: {
            item:item
        },
        success:function(response){
            showMessageAlert(response);
        }
    });
});

function showMessageAlert(message){
    Swal.fire({
        text: message,
        icon: 'success',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        history.go();
    });
}
</script>    
@endsection