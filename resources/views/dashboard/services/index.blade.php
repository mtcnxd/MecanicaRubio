@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar servicio</h6>
        <x-feathericon-tool class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')

        <div class="row m-1 mb-3 pb-3" id="filters">
            <div class="col-md-2">
                <label for="startDate" class="fw-bold">Inicio</label>
                <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-01') }}">
            </div>
            <div class="col-md-2">
                <label for="endDate" class="fw-bold">Final</label>
                <input type="date" class="form-control" id="endDate" value="{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
            </div>
            <div class="col-md-2">
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
            <div class="col-md-2 mt-4">
                <button class="btn btn-success" id="applyFilter">
                    <x-feathericon-search class="table-icon" style="margin: -2px 5px 2px"/>
                    Buscar
                </button>
            </div>
        </div>

        <table class="table table-hover table-borderless" id="services" style="width:100%;">
            <thead>
                <tr>
                    <th width="400px">Servicio/Fallo</th>
                    <th width="400px">Cliente</th>
                    <th>Automovil</th>
                    <th>Fecha servicio</th>
                    <th>Estatus</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}">
                            {{ Str::limit($service->fault, 35) }}
                        </a>
                    </td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->brand }} {{ $service->model }}</td>
                    <td>{{ Carbon\Carbon::parse($service->created_at)->format('d-m-Y') }}</td>
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
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
const startDate   = document.querySelector("#startDate");
const endDate     = document.querySelector("#endDate");
const status      = document.querySelector("#status");
const applyFilter = document.querySelector('#applyFilter');

const table = new DataTable('#services', 
{
    processing: true,
    serverSide: false,
    searching: false,
    lengthChange:false,
    pageLength: 10,
    order: [3, 'asc'],
    /*
    ajax: {
        url: "/api/getDataTableServices",
        data: function(data) {
            data.startDate = startDate.value;
            data.endDate   = endDate.value;
            data.status    = status.value;
        }
    },
    */
    columns:[
        {
            data:'fault',
            orderable: false
        },{
            data:'name'
        },{
            data:'car'
        },{
            data:'created_at'
        },{
            data:'status'
        },{
            data:'total',
            className: 'text-end',
            orderable: false
        }
    ]
});

applyFilter.addEventListener('click', function(){
    table.draw();
}); 
</script>
@endsection