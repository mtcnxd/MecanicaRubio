@extends('includes.body')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="border pt-5 pb-5 p-4 shadow" style="width: 22rem; background-color: var(--gray-200)">
            <h3 class="text-center fw-bold mb-5">Bienvenido</h3>
            <form action="{{ route('login') }}" method="POST" id="showLoader">
                @csrf
                <div class="row p-2">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Correo">
                </div>
                <div class="row p-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                </div>
                <div class="row p-2 pt-2 text-end">
                    <input type="submit" class="btn btn-secondary btn-sm" value="Entrar" id="submit">
                </div>
                <div class="text-center mt-3" style="min-height:26px">
                    <img src="{{ asset('images/image.gif') }}" width="20px" height="20px" style="display:none;" class="mb-3" id="loader">
                </div>
            </form>

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