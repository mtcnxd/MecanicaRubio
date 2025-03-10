@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4>Configuración</h4>
    <hr>
    @if ( session('message') )
        <div class="alert alert-warning alert-dismissible fade show">
            <strong>Mensaje: </strong>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-7">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">API's</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <label class="window-body-form">Configuración de APIs</label>
                <form action="{{ route('setting.update') }}" method="POST" class="border pt-5 pb-4">
                    @csrf
                    @method('POST')
                    @foreach ($configs as $config)
                        <div class="row mt-3">
                            <div class="col-md-3 pt-2 text-end">
                                Nombre
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name[]" value="{{ $config->name }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 pt-2 text-end">
                                Token
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="{{ $config->name }}" value="{{ $config->value }}">
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-8 mt-3 text-end">
                            <button type="submit" class="btn btn-success">
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
@endsection
