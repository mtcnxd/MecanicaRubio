@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="col-md-7">    
        <h6 class="window-title-bar text-uppercase fw-bold">Empleado</h6>
        <div class="window-body shadow p-4 bg-white">
            <label class="window-body-form">Nuevo empleado</label>
            <form action="{{ route('employees.store') }}" method="POST" class="col-md-12 border pt-4 pb-4">
                @method('POST')
                @csrf
                <div class="pt-0 p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Usuario</label>
                            <select class="form-select" name="name">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>RFC</label>
                            <input type="text" class="form-control" name="rfc">
                        </div>
                        <div class="col-md-6">
                            <label>NSS</label>
                            <input type="text" class="form-control" name="rfc">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Salario</label>
                            <input type="number" class="form-control" name="salary" required>
                        </div>
                        <div class="col-md-6">
                            <label>Periodo</label>
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
                        <div class="col-md-6">
                            <label>Hora extra</label>
                            <input type="text" class="form-control" name="extra">
                        </div>
                        <div class="col-md-6">
                            <label>Estatus</label>
                            <select class="form-select" name="status">
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Puesto</label>
                            <input type="text" class="form-control" name="level">
                        </div>
                        <div class="col-md-6">
                            <label>Departamento</label>
                            <input type="text" class="form-control" name="depto">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Comentarios</label>
                            <textarea class="form-control" cols="30" rows="4" name="comments"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-sm btn-success">
                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection