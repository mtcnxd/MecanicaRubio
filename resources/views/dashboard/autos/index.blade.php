@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar auto</h6>
        <a href="{{ route('autos.create') }}">
            <x-feathericon-truck class="window-title-icon" data-bs-toggle="tooltip" data-bs-title="Nuevo automovil" data-bs-placement="left"/>
        </a>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-warning alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif        
        <table class="table table-hover table-borderless" id="autos">
            <thead>
                <tr>
                    <th scope="col">Automovil</th>
                    <th scope="col" class="text-center">Año / Modelo</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Placa</th>
                    <th scope="col" class="text-end">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($autos as $auto)
                <tr>
                    <td>
                        <a href="{{ route('autos.show', $auto->id) }}">
                            <span class="table-icon-round">{{ Str::limit($auto->brand,1, null) }}</span>
                            {{ $auto->brand }} {{ $auto->model }}
                        </a>
                    </td>
                    <td class="text-center">{{ $auto->year }}</td>
                    <td>{{ $auto->comments }}</td>
                    <td>
                        <a href="{{ route('clients.show', $auto->client_id) }}">
                            {{ $auto->name }}
                        </a>
                    </td>
                    <td>{{ $auto->plate }}</td>
                    <td class="text-end">
                        <a href="{{ route('autos.edit', $auto->id) }}">
                            <x-feathericon-edit class="table-icon"/>
                        </a>
                    </td>
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
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

new DataTable('#autos', {
    pageLength: 10,
    lengthMenu: [10, 25, 50],
    columnDefs: [{
        orderable: false,
        target: [1,3,4]
    }]            
});
</script>
@endsection