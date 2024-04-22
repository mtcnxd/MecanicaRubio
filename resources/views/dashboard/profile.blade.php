@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4>Configuración del perfil</h4>
    <hr>
    @if ( session('error') )
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error: </strong>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ( session('message') )
        <div class="alert alert-warning alert-dismissible fade show">
            <strong>Mensaje: </strong>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Datos personales</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <label class="window-body-form">Editar perfil</label>
                <form action="#" method="POST" class="border pt-5 pb-4">
                    <div class="row">
                        <div class="col-md-3 pt-2 text-end">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ $self->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Teléfono
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="name" value="{{ $self->phone }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Correo
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ $self->email }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Salario
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="name" value="{{ $self->salary }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option>Semanal</option>
                                <option>Quincenal</option>
                                <option>Mensual</option>
                                <option>Variable</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Hora extra
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="extra" value="{{ $self->extra }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Fecha inicio
                        </div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="name" value="{{ Carbon\Carbon::parse($self->created_at)->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Contraseña
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-8 mt-3 text-end">
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Agregar nuevo empleado</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <label class="window-body-form">Nuevo empleado</label>
                <form action="{{ route('employees.store') }}" method="POST" class="border pt-5 pb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 pt-2 text-end">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Teléfono
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Correo
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Salario
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">$</span>                            
                                <input type="text" class="form-control" name="salary" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="periodicity">
                                <option>Semanal</option>
                                <option>Quincenal</option>
                                <option>Mensual</option>
                                <option>Variable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Hora extra
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="extra" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Fecha inicio
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="register" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="checkbox" class="mt-2">
                                <input type="checkbox" class="form-check-input" name="create" id="create">
                                Crear usuario
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Contraseña
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="password" id="password" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="repeat" id="repeat" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-8 mt-3 text-end">
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-hover shadow-sm" style="border: solid 1px #dedede">
                <thead>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th>Fecha Alta</th>
                    <th>Salario</th>
                    <th>Periodicidad</th>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->status }}</td>
                        <td>{{ Carbon\Carbon::parse($employee->created_at)->format('d-m-Y') }}</td>
                        <td>{{ number_format($employee->salary,2) }}</td>
                        <td>{{ $employee->periodicity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $("#create").on('change', function(){
        if ($(this).prop('checked')) {
            $("#password").removeAttr('disabled');
            $("#repeat").removeAttr('disabled');
        } else {
            $("#password").attr('disabled', 'disabled');
            $("#repeat").attr('disabled','disabled');
        }
    });
</script>
@endsection