@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="col-md-7">
        <h6 class="window-title-bar text-uppercase fw-bold">Configuracion</h6>
        <div class="window-body shadow p-4 bg-white">
            <label class="window-body-form">Nuevo indice de configuración</label>
            <form action="{{ route('setting.store') }}" method="POST" class="border pt-4 pb-4 mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Clave
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Valor
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="value">
                    </div>
                </div>
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

            <label class="window-body-form">Editar indice de configuración</label>
            <form action="{{ route('setting.update') }}" method="POST" class="border pt-5 pb-4">
                @csrf
                @method('POST')
                @foreach ($configs as $config)
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Clave
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name[]" value="{{ $config->name }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 pt-2 text-end">
                            Valor
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
                            Editar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection