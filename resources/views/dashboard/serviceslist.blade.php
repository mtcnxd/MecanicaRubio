@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar servicio</h6>
        <x-feathericon-tool class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row m-1 mb-3 pb-3" id="filters">
            <div class="col-md-2">
                <label for="startDate">Inicio</label>
                <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-01') }}">
            </div>
            <div class="col-md-2">
                <label for="endDate">Final</label>
                <input type="date" class="form-control" id="endDate" value="{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
            </div>
            <div class="col-md-2">
                <label for="endDate">Estatus</label>
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
                <input type="button" class="btn btn-primary" id="applyFilter" value="Buscar">
            </div>
        </div>
        <table class="table table-hover table-borderless" id="services">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Automovil</th>
                    <th>Servicio/Fallo</th>
                    <th>Fecha servicio</th>
                    <th>Estatus</th>
                    <th class="text-end">Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)

            @endforeach
            </tbody>
        </table>
    </div>
</div>
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
        url:"{{ route('searchPostalCode') }}",
        columns: [
            {
                data:'client',
                render: function(data, type, row){
                    return '<a href="{{ route('clients.show', $service->client_id) }}">'+
                           '<x-feathericon-chevrons-right class="table-icon" style="color: var(--amber-700);"/>' + row.client +'</a>';
                }
            },{
                data:'car'
            },{
                data:'fault'
            },{
                data:'created_at',
                render: function(data, type, row){
                    return new Date(row.created_at).toLocaleDateString();
                }
            },{
                data:'status',
                render: function(data, type, row){
                    if (row.status == 'Finalizado' || row.status == 'Entregado'){
                        return '<span class="badge text-bg-success">'+ row.status +'</span>';
                    }
                    else if (row.status == 'Cancelado') {
                        return '<span class="badge text-bg-secondary">'+ row.status +'</span>';
                    }
                    else {
                        return '<span class="badge text-bg-warning">'+ row.status +'</span>';
                    }
                }
            },{
                data:'total',
                className: 'dt-body-right',
                render: function(data, type, row){
                    if (row.total){
                        return '$' + row.total;
                    }
                    return '$0.0';
                }
            },{
                data:'show',
                render: function(data, type, row){
                    let id = 14;
                    return '<a href="{{ route('services.show', '+ id +') }}"><x-feathericon-eye class="table-icon"/></a>';
                }
            }
        ],
        processing: true,
        serverSide: true,
        searching:false,
        lengthChange: false,
        pageLength: 10,
        columnDefs: [{
            orderable: false,
            target: [1,2,5,6]
        }],
        order: [
            [3, 'asc']
        ]
    });
    
    applyFilter.addEventListener('click', function(){
        table.draw();
    });

</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection