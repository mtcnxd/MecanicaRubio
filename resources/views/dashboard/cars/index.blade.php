@extends('includes.body')

@section('content')
<div class="main-content shadow">
    @include('includes.alert')
    <h6 class="title-bar text-uppercase fw-bold">Buscar auto</h6>
    <div class="window-body pt-3 pb-3 bg-white">
        <table class="table table-hover table-borderless mb-4" id="autos">
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
            @foreach ($cars as $car)
                <tr>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}">
                            <span class="table-icon-round">{{ Str::limit($car->brand,1, null) }}</span>
                            {{ $car->brand }} {{ $car->model }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('clients.show', $car->client->id) }}">
                            {{ $car->client->name }}
                        </a>
                    </td>
                    <td>{{ $car->comments }}</td>
                    <td>{{ $car->serie }}</td>
                    <td>{{ $car->year }}</td>
                    <td class="text-end">
                        <a href="{{ route('cars.edit', $car->id) }}">
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