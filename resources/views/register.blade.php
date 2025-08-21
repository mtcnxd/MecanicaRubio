@extends('includes.body')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="border pt-5 pb-5 p-4 shadow" style="width: 30rem; background-color: var(--gray-200)">
            <div class="mb-3">
                <h3 class="text-center fw-bold mb-4">Bienvenido</h3>
            </div>
            
            @if (session('message'))
                <div class="banner banner-warning fs-7 fw-bold" id="alert">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('user.store') }}" method="POST" id="showLoader">
                @csrf
                <div class="row p-2">
                    <div class="col-md-12">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    </div>
                </div>                
                <div class="row p-2">
                    <div class="col-md-12">
                        <label for="email">Correo</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Correo" required>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm">Confirmar</label>
                        <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Repetir" required>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="agree" required>
                            Estoy de acuerdo en registrarme
                          </label>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-secondary btn-sm w-100" id="submit" value="Registrarme">
                    </div>
                </div>
                <div class="text-center mt-3" style="min-height:26px">
                    <img src="{{ asset('images/image.gif') }}" width="20px" height="20px" style="display:none;" class="mb-3" id="loader">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#submit").on('click', function() {
            $("#loader").show();
        });
    </script>
@endsection