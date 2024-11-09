@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>    
    <div class="window-body bg-white">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <strong>Mensaje: </strong>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <label class="window-body-form">Editar usuario</label>
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="border pt-5 pb-4">
        @method('PUT')
        @csrf        
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Nombre
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Correo
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Rol
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="rol">
                            <option value="admin">Admin</option>
                            <option value="limit">Limit</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Estatus
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="status">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Cambiar
                    </div>
                    <div class="col-md-3 pt-2">
                        <input type="checkbox" class="form-checkbox" name="change">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Contraseña
                    </div>
                    <div class="col-md-3">
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Repetir contraseña
                    </div>
                    <div class="col-md-3">
                        <input type="password" class="form-control" name="repeat">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Comentarios
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="comments">{{ $user->comments }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="col-md-6 mt-3 text-end">
                        <button type="button" class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Borrar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteUser(id){
    fetch(`/users/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                location.replace('/users');
            });
        } else {
            alert("Error al eliminar");
        }
    })
    .catch(error => console.log(error));
}
</script>
@endsection

