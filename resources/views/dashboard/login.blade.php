@extends('includes.body')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="border pt-5 pb-5 p-4 shadow" style="width: 22rem; background-color: var(--gray-200)">
            <h3 class="text-center fw-bold mb-4">Bienvenido</h3>

            <p class="fs-7">Tambien puede iniciar sesion con su cuenta de Google</p>

            <hr>
            <form action="{{ route('login') }}" method="POST" id="showLoader">
                @csrf
                <div class="row p-2">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Correo">
                </div>
                <div class="row p-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                </div>

                <div class="row mb-3">
                    <div class="col mr-1">
                        <a href="{{ route('google-redirect') }}" class="btn btn-white btn-sm w-100">Google</a>
                    </div>
                    <div class="col ml-1">
                        <input type="submit" class="btn btn-secondary btn-sm w-100" value="Entrar" id="submit">
                    </div>
                </div>

                <div class="text-center mt-3" style="min-height:26px">
                    <img src="{{ asset('images/image.gif') }}" width="20px" height="20px" style="display:none;" class="mb-3" id="loader">
                </div>
            </form>

            <p class="text-center">
                <a href="">¿Olvidaste tu contraseña?</a>
            </p>

            @if ( session('error') )
                <div class="alert alert-danger alert-dismissible fade show" id="alert">
                    {{ session('error') }}
                </div>
            @endif

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