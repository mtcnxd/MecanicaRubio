@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Crear nuevo empleado</label>
        <form action="{{ route('employees.store') }}" method="POST" class="border pt-5 pb-4">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Nombre
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        RFC
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
                        <input type="number" class="form-control" name="salary">
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
                            <option value="">Activo</option>
                            <option value="">Inactivo</option>
                        </select>
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