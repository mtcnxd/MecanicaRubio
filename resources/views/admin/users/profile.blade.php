@extends('includes.body')

@section('content')
@include('includes.alert')
<div class="window-container">    
    <div class="col-md-7">
        <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Perfil</span></h6>
        <div class="window-body shadow p-4">
            <form action="{{ route('profile.update') }}" method="POST">
                <div class="form-container border">
                    @method('POST')
                    @csrf

                    @isset($self->avatar)
                        <div class="text-center mb-3">
                            <img src="{{ $self->avatar }}" width="86px" height="86px" class="rounded-pill border border-4">
                        </div>
                    @endisset

                    <div class="row">
                        <div class="col-md-12">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ $self->name }}">
                            <input type="hidden" name="id" value="{{ $self->id }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <x-feathericon-smartphone class="table-icon" style="margin: -2px 5px 2px"/>
                                </span>
                                <input type="number" class="form-control" name="phone" value="{{ $self->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Correo</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <x-feathericon-mail class="table-icon" style="margin: -2px 5px 2px"/>
                                </span>
                                <input type="text" class="form-control" name="email" value="{{ $self->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Fecha inicio</label>
                            <input type="date" class="form-control" name="date" value="{{ isset($self->created_at) ? $self->created_at->format('Y-m-d') : '' }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label>Antiguedad</label>
                            <input type="text" class="form-control" value="{{ isset($self->created_at) ? $self->created_at->diffInMonths() : '-' }} meses" disabled>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="password" required placeholder="Cambiar contraseña">
                        </div>
                        <div class="col-md-6">
                            <label>Repetir</label>
                            <input type="password" class="form-control" name="repeat" required placeholder="Repetir contraseña">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 text-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary">Atras</a>
                        <button type="submit" class="btn btn-sm btn-success">
                            <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
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