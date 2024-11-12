@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Registrar Nomina</label>
        <form action="{{ route('payroll.store') }}" method="POST" class="border pt-5 pb-4">
            @csrf
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Empleado
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="employee" id="employee" value="{{ $employee->name }}" disabled>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Sueldo
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="salary" id="salary" style="text-align: right" value="{{ $employee->salary }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Horas extra
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="hours" id="hours" value="{{ $employee->hours }}">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="hidden" name="price" id="price" value="{{ $employee->price }}">
                            <input type="text" class="form-control" name="hours_total" id="hours_total" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Bonos
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="bonds_comment" id="bonds_comment" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="bonds" id="bonds" style="text-align: right" value="{{ $employee->bonds }}">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descuentos
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="discount_comment" id="discount_comment" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="discount" id="discount" value="0" style="text-align: right">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Total
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="name" id="total" value="0" style="text-align: right" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Estatus
                    </div>
                    <div class="col-md-4">
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
@endsection