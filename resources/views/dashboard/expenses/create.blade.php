@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body p-4 bg-white">
        <label class="window-body-form">Registrar egreso</label>
        <form action="{{ route('expenses.store') }}" method="POST" class="border pt-5 pb-4" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">                
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Concepto
                    </div>    
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descripción
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" cols="30" rows="4" name="description"></textarea>
                    </div>                
                </div>             

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Cantidad
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="amount" value="1">
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Precio
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Responsable
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" name="responsible" required>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Estatus
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="status" required>
                            <option>Pendiente</option>
                            <option>Pagado</option>
                        </select>
                    </div>
                    <div class="col-md-3 pt-2 text-end">
                        Adjuntar recibo/nota
                    </div>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="attach">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mt-3 text-end">
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">
                    <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection