@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    @include('includes.div_warning')
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar Usuario</h6>
        <x-feathericon-tool class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <table class="table table-hover table-borderless" id="services">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Status</th>
                    <th style="width: 150px;">Fecha de alta</th>
                    <th style="width: 20px;">&nbsp;</th>
                </tr>
            </thead>
            @foreach ($users as $user) 
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">
                            <x-feathericon-edit class="table-icon"/>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection