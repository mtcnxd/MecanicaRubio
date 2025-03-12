@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar auto</h6>
        <x-feathericon-truck class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')
        <table class="table table-hover table-borderless" id="autos">
            <thead>
                <tr>
                    <th>Automovil</th>
                    <th>Cliente</th>
                    <th>Comentario</th>
                    <th>VIN</th>
                    <th>Año</th>
                    <th class="text-end">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($autos as $auto)
                <tr>
                    <td>
                        <a href="{{ route('cars.show', $auto->id) }}">
                            <span class="table-icon-round">{{ Str::limit($auto->brand,1, null) }}</span>
                            {{ $auto->brand }} {{ $auto->model }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('clients.show', $auto->client_id) }}">
                            {{ $auto->name }}
                        </a>
                    </td>
                    <td>{{ $auto->comments }}</td>
                    <td>{{ $auto->serie }}</td>
                    <td>{{ $auto->year }}</td>
                    <td class="text-end">
                        <a href="{{ route('cars.edit', $auto->id) }}">
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
        lengthMenu: [10, 50, 100],
        columnDefs: [{
            orderable: false,
            target: [2,3,4,5]
        }]            
    });
    </script>
@endsection