@extends('includes.body')

@section('content')
<div class="main-content shadow">
    @include('includes.alert')
    <h6 class="title-bar text-uppercase fw-bold">Buscar</h6>
    <div class="window-body bg-white">
        <table class="table table-hover table-borderless" id="services">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Empleado</th>
                    <th>Usuario</th>
                    <th>Fecha de inicio</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            @foreach ($employees as $employee) 
            <tbody>
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a></td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->user_status }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee->start_date)->format('d-m-Y') }}</td>
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