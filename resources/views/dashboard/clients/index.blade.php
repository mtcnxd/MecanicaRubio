@extends('includes.body')

@section('content')
<div class="main-content shadow">
    @include('includes.alert')    
    <h6 class="title-bar text-uppercase fw-bold">Buscar cliente</h6>
    <div class="window-body pb-3 pt-3 bg-white">
        <table class="table table-hover table-borderless mb-4" id="clients">
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
        pageLength: 10,
        lengthMenu: [10, 50, 100],
        columnDefs: [{
            orderable: false,
            target: [1,2,3]
        }]
    });
</script>
@endsection