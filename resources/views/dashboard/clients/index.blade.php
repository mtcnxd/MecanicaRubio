@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar cliente</h6>
        <a href="{{ route('clients.create') }}">
            <x-feathericon-user-plus class="window-title-icon"/>
        </a>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ( session('error') )
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif        
        <table class="table table-hover table-borderless" id="clients">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th class="text-end">Editar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}">
                            <span class="table-icon-round">{{ Str::limit($client->name,1, null) }}</span>
                            {{ $client->name }}
                        </a>
                    </td>
                    <td>
                        <x-feathericon-phone-call class="table-icon" style="margin-top: -2px; color: var(--amber-700);"/>
                        {{ $client->phone }}
                    </td>
                    <td>{{ $client->street }} {{ $client->address }}</td>
                    <td class="text-end">
                        <a href="{{ route('clients.edit', $client->id) }}">
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

new DataTable('#clients', {
    pageLength: 15,
    lengthMenu: [15, 50, 100],
    columnDefs: [{
        orderable: false,
        target: [1,2,3]
    }]
});
</script>
@endsection