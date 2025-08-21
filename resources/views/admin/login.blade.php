<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingenieria Mecanica Rubio</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap_custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
	@yield('css')
</head>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="border pt-5 pb-5 p-4 shadow" style="width: 22rem; background-color: var(--gray-200)">
        <div class="mb-3">
            <h3 class="text-center fw-bold mb-4">Bienvenido</h3>
            <p class="fs-7">Aun no estas registrado, crea una cuenta para poder visualizar tus servicios</p>
            <a class="btn btn-sm btn-secondary w-100" href="{{ route('user.register') }}">
                Registrarme
            </a>
        </div>

        <p class="fs-7">Si lo prefieres, puedes iniciar sesion con tu cuenta de Google.</p>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $("#submit").on('click', function() {
        $("#loader").show();
    });
</script>
</body>
</html>