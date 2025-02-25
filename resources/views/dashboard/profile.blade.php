@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4>Configuración del perfil</h4>
    <hr>
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
                <form action="{{ route('profile') }}" method="POST" class="border pt-5 pb-4">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-3 pt-2 text-end">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ $self->name }}">
                            <input type="hidden" name="id" value="{{ $self->id }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Teléfono
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="phone" value="{{ $self->phone }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Correo
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" value="{{ $self->email }}" disabled>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Fecha inicio
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="date" value="{{ $self->created_at->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{ $self->created_at->diffInMonths() }} meses" disabled>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Contraseña
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="repeat" required>
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