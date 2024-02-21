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
        <table class="table table-hover table-borderless" id="clients">
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
                <tr>
                    <td>
                        <a href="{{ route('clients.show', $service->client_id) }}">
                            <x-feathericon-chevrons-right class="table-icon" style="color: var(--amber-700);"/>
                            {{ $service->name }}
                        </a>
                    </td>
                    <td>{{ $service->brand }} {{ $service->model }}</td>
                    <td>{{ Str::limit($service->fault, 80) }}</td>
                    <td>{{ date ('d-m-Y', strtotime($service->created_at)) }}</td>
                    <td>
                        @if ($service->status == 'Finalizado' || $service->status == 'Entregado')
                            <span class="badge text-bg-success">{{ $service->status }}</span>
                        @else
                            <span class="badge text-bg-warning">{{ $service->status }}</span>
                        @endif
                    </td>
                    <td class="text-end">{{ '$'.number_format($service->total,2) }}</td>
                    <td class="text-end">
                        <a href="{{ route('services.show', $service->id) }}">
                            <x-feathericon-eye class="table-icon"/>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#clients', {
            pageLength: 15,
            lengthMenu: [15, 50, 100],
            columnDefs: [{
                orderable: false,
                target: [1,2,5,6]
            }],
            order: [
                [3, 'desc']
            ]
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection