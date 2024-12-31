@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Buscar Empleado</h6>
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
                    <th>Fecha de alta</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            @foreach ($employees as $employee) 
            <tbody>
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td><a href="{{ route('employees.edit', $employee->id) }}">{{ $employee->name }}</a></td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}">
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

@section('css')
@endsection

@section('js')
@endsection