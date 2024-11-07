@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar Usuarios</h6>
        <x-feathericon-tool class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-hover table-borderless" id="services" style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th>Fecha alta</th>
                    <th>Rol</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            @foreach ($users as $user) 
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="#">{{ $user->name }}</a></td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $user->rol }}</td>
                    <td><x-feathericon-edit class="table-icon"/></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('css')
@endsection

@section('js')
@endsection