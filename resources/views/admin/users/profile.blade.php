@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="row">
        <div class="col-md-6">
            <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Perfil</span></h6>
            <div class="window-body shadow p-4">
                <div class="form-container border">
                        <form action="{{ route('profile.update') }}" method="POST">
                        <label class="window-body-form">Editar perfil</label>
                        @csrf
                        @method('POST')

                        @isset($self->avatar)
                            <div class="text-center mb-3">
                                <img src="{{ $self->avatar }}" width="86px" height="86px" class="rounded-pill border border-4">
                            </div>
                        @endisset

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
                                <div class="input-group">
                                    <input type="number" class="form-control" name="phone" value="{{ $self->phone }}">
                                    <span class="input-group-text">
                                        <x-feathericon-smartphone class="table-icon" style="margin: -2px 5px 2px"/>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 pt-2 text-end">
                                Correo
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" value="{{ $self->email }}" disabled>
                                    <span class="input-group-text">
                                        <x-feathericon-mail class="table-icon" style="margin: -2px 5px 2px"/>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-3 pt-2 text-end">
                                Fecha inicio
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="date" value="{{ isset($self->created_at) ? $self->created_at->format('Y-m-d') : '' }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{ isset($self->created_at) ? $self->created_at->diffInMonths() : '-' }} meses" disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 pt-2 text-end">
                                Contraseña
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" required placeholder="Cambiar contraseña">
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="repeat" required placeholder="Repetir contraseña">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                &nbsp;
                            </div>
                            <div class="col-md-8 mt-3 text-end">
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