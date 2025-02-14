@extends('includes.body')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="border pt-5 pb-5 p-4 shadow" style="width: 22rem; background-color: var(--windows-background)">
            <h3 class="text-center fw-bold">Bienvenido</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row p-2">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Correo">
                </div>
                <div class="row p-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                </div>
                <div class="row p-2 pt-2 text-end">
                    <input type="submit" class="btn btn-secondary btn-sm" value="Entrar">
                </div>
                <div class="text-center" style="min-height:24px">
                    <img src="{{ asset('image.gif') }}" width="20px" height="20px" style="display:none" id="loader">
                </div>
            </form>

            @if ( session('error') )
                <div class="alert alert-danger alert-dismissible fade show" id="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#login").on('click', function(){
            $("#loader").show();
            $.ajax({
                url:"/api/startSession",
                method:'POST',
                data:{
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                success: function(response){
                    if (response.success == true){
                        location.replace('/services');
                    } else {
                        $("#loader").hide();
                        $("#alert").show();
                    }
                }
            });
        });
    </script>
@endsection