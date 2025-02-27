@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Editar empleado</label>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="border pt-5 pb-4">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Nombre
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="{{ $employee->id }}" disabled>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="phone" value="{{ $employee->phone }}">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        RFC
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="rfc" value="{{ $employee->rfc }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        CURP
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="curp" value="{{ $employee->curp }}">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        NSS
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="nss" value="{{ $employee->nss }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Salario
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="salary" value="{{ $employee->salary }}">
                        </div>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Periodo
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="periodicity">
                            <option>Semanal</option>
                            <option>Quincenal</option>
                            <option>Mensual</option>
                            <option>Comisionista</option>
                            <option>Sin definir</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Hora extra
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="extra" value="{{ $employee->extra }}">
                        </div>
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
                        <textarea class="form-control" cols="30" rows="4" name="comments">{{ $employee->comments }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col mb-0 mt-0 m-4 border">
                <div class="row">
                    <div class="col-md-6 pt-2">
                        <strong>Fecha de alta:</strong> {{ $extra->format('d-m-Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pt-2">
                        <strong>Antiguedad:</strong> {{ $extra->diffInMonths() }} meses
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="col-md-6 mt-3 text-end">
                        <img src="{{ asset('image.gif') }}" width="20px" height="20px" id="loader" style="margin-right: 20px; display:none;">
                        <a href="#" id="btn-delete" class="btn btn-secondary btn-sm">Eliminar</a>
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-sm btn-success">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    btnDelete = document.getElementById('btn-delete');
    btnDelete.addEventListener('click', function(event){
        event.preventDefault();
        $("#loader").show();

        $.ajax({
            type: "POST",
            url:  "/api/deleteUser",
            data: {
                user: {{ $employee->id }}
            },
            success: function (response) {
                console.log(response);
                showMessageAlert('success', response.message);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.table(jqXHR)
            }
        }).then(() => {
            $("#loader").hide();
        });
    })

    function showMessageAlert(type, message){
        Swal.fire({
            text: message,
            icon: type,
            confirmButtonText: 'Aceptar'
        }).then(() => {
            location.replace('/employees');
        });
    }
</script>
@endsection