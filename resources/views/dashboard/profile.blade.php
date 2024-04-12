@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4>Configuración del perfil</h4>
    <hr>
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
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Correo
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
                            <input type="text" class="form-control" name="name" required>
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
                            <input type="password" class="form-control" name="name" placeholder="Confirmar" required>
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
                <h6 class="window-title-text">Configuración del entorno</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <div class="row col-md-4 mb-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-success">
                            <x-feathericon-plus class="table-icon" style="margin: -2px 0px 2px"/>
                            Nuevo
                        </button>
                        <button type="button" class="btn btn-outline-success">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
