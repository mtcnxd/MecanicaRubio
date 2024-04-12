@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Registrar Nomina</label>
        <form action="{{ route('expenses.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="col-md-6">                
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Empleado
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" name="employee" id="employee">
                            <option value="0"> - Seleccione empleado - </option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Concepto
                    </div>    
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" value="Nomina #{{ date('Ymd') }}">
                        </div>
                    </div>
                </div>         

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Sueldo
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="name" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Horas extra
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="name" required>
                        </div>
                    </div>
                </div> 

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Bonos
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="name" required>
                        </div>
                    </div>
                </div> 

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descuentos
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="name" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Total
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="name" required>
                        </div>
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

@section('js')
<script>
$("#employee").on('change', function(){
    console.log($(this).val());
});
</script>
@endsection