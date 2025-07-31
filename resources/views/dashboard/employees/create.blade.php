@extends('includes.body')

@section('content')
<div class="main-content shadow">
    <h6 class="title-bar text-uppercase fw-bold">Empleados</h6>
    <div class="window-body p-4 bg-white">
        <label class="window-body-form">Crear nuevo empleado</label>
        <form action="{{ route('employees.store') }}" method="POST" class="border pt-4 pb-4">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Usuario
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" name="name">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        RFC
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="rfc">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        NSS
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="rfc">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Salario
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="salary" required>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Periodo
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="periodicity">
                            <option value="Semanal">Semanal</option>
                            <option value="Quincenal">Quincenal</option>
                            <option value="Mensual">Mensual</option>
                            <option value="Comisionista">Comisionista</option>
                            <option value="Sin definir">Sin definir</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Hora extra
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="extra">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Estatus
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="status">
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Puesto
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="level">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Departamento
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="depto">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="col-md-6 mt-3 text-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">
                            <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('js')
@endsection