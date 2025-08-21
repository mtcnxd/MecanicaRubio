@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <h6 class="window-title-bar shadow text-uppercase fw-bold">Usuarios</h6>
    <div class="window-body shadow bg-white">
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
                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
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