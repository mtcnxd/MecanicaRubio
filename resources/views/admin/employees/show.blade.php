@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Empleado</span></h6>
    <div class="window-body shadow p-4">
        <div class="form-container border">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                <p class="fs-5 fw-bold">Detalles empleado</p>
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"> #{{ $employee->id }}</span>
                                    <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Correo</label>
                                <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>Teléfono</label>
                                <input type="number" class="form-control" name="phone" value="{{ $employee->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" name="rfc" value="{{ $employee->rfc }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>CURP</label>
                                <input type="text" class="form-control" name="curp" value="{{ $employee->curp }}">
                            </div>
                            <div class="col-md-6">
                                <label>NSS</label>
                                <input type="text" class="form-control" name="nss" value="{{ $employee->nss }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>Salario</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" name="salary" value="{{ $employee->salary }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Periodo</label>
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
                            <div class="col-md-6">
                                <label>Hora extra</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="extra" value="{{ $employee->extra }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Estatus</label>
                                <select class="form-select" name="status">
                                    <option value="">Activo</option>
                                    <option value="">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Comentarios</label>
                                <textarea class="form-control" cols="30" rows="4" name="comments">{{ $employee->comments }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col mb-0 mt-0 m-4">
                        <div class="row mt-2">
                            <h5 class="mt-2">Antiguedad</h5>
                            <div class="col-md-6 pt-2">
                                <strong>Fecha de inicio:</strong> 
                                <input type="date" value="{{ $extra->format('Y-m-d') }}" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 pt-2">
                                <strong>Antiguedad:</strong>
                                <input type="text" value="{{ $extra->diffInMonths() }} meses" class="form-control" disabled>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <h5 class="mt-2">Vacaciones</h5>
                            <div class="col-md-6 pt-2">
                                <strong>Dias tomados:</strong> 
                                <input type="text" value="4" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 pt-2">
                                <strong>Dias pendientes:</strong>
                                <input type="text" value="8" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <div class="form-container border">
                <form id="vacations">
                    <p class="fs-5 fw-bold">Historial de solicitudes</p>
                    <div class="row">
                        <table class="table table-hover">
                        @foreach ($vacations as $vacation)
                            <tr>
                                <td>{{ $vacation->type }}</td>
                                <td>{{ $vacation->comment }}</td>
                                <td class="text-end">{{ $vacation->date }}</td>
                                <td class="text-end">
                                    @if (Carbon\Carbon::parse($vacation->date)->lt(Carbon\Carbon::now()))
                                        <a href="http://">Cancelar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </form>
            </div>
        </div>        

        <div class="mt-4">
            <div class="form-container border">
                <form id="vacations">
                    <p class="fs-5 fw-bold">Solicitudes de ausencia</p>
                    <div class="col-md-12">
                        <label for="date">Motivo de ausencia</label>
                        <select class="form-select" name="type" id="type">
                            <option>Permiso</option>
                            <option>Salud</option>
                            <option>Vacaciones</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="date">Fecha de ausencia</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="comment">Comentario</label>
                        <textarea class="form-control" name="comment" id="comment"></textarea>
                    </div>

                    <div class="col-md-12 mt-3 text-end">
                        <button type="button" class="btn btn-sm btn-success" onclick="createRow()">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function createRow(){
        var employee = {{ $employee->id }};
        var type     = $('#type');
        var date     = $('#date');
        var comment  = $('#comment');

        $.ajax({
            url: "{{ route('employees.vacations') }}",
            method: 'POST',
            data:{
                employee:employee,
                type:type.val(),
                date:date.val(),
                comment:comment.val()
            },
            success:function(response){
                showMessageAlert('success', response.message);
                $("#vacations").trigger('reset');
            }
        });
    }

    function showMessageAlert(type, message){
        Swal.fire({
            text: message,
            icon: type,
            confirmButtonText: 'Aceptar'
        })
        .then(() => {
            location.reload();
        });
    }
</script>
@endsection