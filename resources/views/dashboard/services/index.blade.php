@extends('includes.body')

@section('content')
<div class="main-content shadow">
    @include('includes.alert')
    <h6 class="title-bar text-uppercase fw-bold">Buscar</h6>
    <div class="window-body pt-3 pb-3 bg-white">
        <div class="row m-1 mb-3 pb-3" id="filters">
            <div class="col-md-3">
                <label for="endDate" class="fw-bold">Cliente</label>
                <select class="form-select" id="client">
                    <option>Todos</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="endDate" class="fw-bold">Estatus</label>
                <select class="form-select" id="status">
                    <option>Todos</option>
                    <option>Cancelado</option>
                    <option>Pendiente</option>
                    <option>Esperando cliente</option>
                    <option>Esperando refaccion</option>
                    <option>Finalizado</option>
                    <option>Entregado</option>
                </select>
            </div>
            <div class="col-md-4 mt-4">
                <button class="btn btn-success" id="applyFilter">
                    <x-feathericon-search class="table-icon" style="margin: -2px 5px 2px"/>
                    Filtrar
                </button>
            </div>
            <div class="col-md-2">
                <label for="searchBox" class="fw-bold">Automovil</label>
                <input type="text" class="form-control" id="searchBox">
            </div>
        </div>

        <table class="table table-hover table-borderless mb-4" id="services" style="width:100%;">
            <thead>
                <tr>
                    <th width="30px">ID</th>
                    <th width="330px">Servicio/Fallo</th>
                    <th width="250px">Cliente</th>
                    <th>Automovil</th>
                    <th>Entrada</th>
                    <th width="100px" class="text-center">Salida</th>
                    <th width="100px" class="text-center">Estatus</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}">
                            {{ Str::limit($service->fault, 32) }}
                        </a>
                    </td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->brand }} {{ $service->model }}</td>
                    <td>{{ Carbon\Carbon::parse($service->entry_date)->format('d-m-Y') }}</td>
                    <td>{{ isset($service->finished_date) ? Carbon\Carbon::parse($service->finished_date)->format('d-m-Y') : null }}</td>
                    <td>
                        @switch($service->status)
                        @case('Entregado')
                            <span class="badge text-bg-success">{{ $service->status }}</span>
                            @break
                        @case('Pendiente')
                            <span class="badge text-bg-warning">{{ $service->status }}</span>
                            @break
                        @default
                            <span class="badge text-bg-secondary">{{ $service->status }}</span>
                        @endswitch
                    </td>
                    <td class="text-end">{{ "$".number_format($service->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>

$('#client').select2();

const client      = document.querySelector("#client");
const status      = document.querySelector("#status");
const applyFilter = document.querySelector('#applyFilter');

const table = new DataTable('#services', 
{
    processing: true,
    serverSide: true,
    searching: true,
    lengthChange:false,
    pageLength: 15,
    order: [5, 'asc'],
    ajax: {
        url: "{{ route('getDataTableServices') }}",
        data: function(data) {
            data.client = client.value;
            data.status = status.value;
        }
    },
    columns:[
        {
            data:'service_id',
            orderable: true
        },{
            data:'fault',
            orderable: false
        },{
            data:'name'
        },{
            data:'car'
        },{
            data:'entry_date'
        },{
            data:'finished_date'
        },{
            data:'status'
        },{
            data:'total',
            className: 'text-end',
            orderable: false
        }
    ]
});

$("#searchBox").on('keyup', function(){
    table.columns(3).search(this.value).draw();
})

applyFilter.addEventListener('click', function(){
    table.draw();
}); 
</script>
@endsection
