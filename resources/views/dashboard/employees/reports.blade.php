@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-2">
                <form action="{{ route('reports.employees') }}" method="GET">
                    @csrf
                    <div class="card-body p-1 row">
                        <div class="col">
                            <select name="employee" id="employee" class="form-select">
                                <option value="">- Seleccione un empleado -</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->user_id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success" id="search">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @isset($results)
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card -p2">
                    <div class="card-body">
                        <div class="row m-0 p-2">
                            <div class="col-md-6">
                                <strong class="p-0 fs-8">EMPLEADO: </strong>
                                <input type="text" class="form-control" value="{{ $employeeInfo->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <strong class="p-0 fs-8">CORREO: </strong>
                                <input type="text" class="form-control" value="{{ $employeeInfo->email }}" disabled>
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="col-md-6">
                                <strong class="p-0 fs-8">PUESTO: </strong>
                                <input type="text" class="form-control" value="{{ $employeeInfo->depto }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <strong class="p-0 fs-8">ANTIGUEDAD: </strong>
                                <input type="text" class="form-control" value="{{ Carbon\Carbon::parse($employeeInfo->created_at)->format('d-m-Y') }}" disabled>
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="col-md-6">
                                <strong class="p-0 fs-8">CAJA DE AHORRO: </strong>
                                <input type="text" class="form-control" value="{{ "$".number_format(abs($results->sum('amount')),2) }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <p class="text-uppercase fs-8">Desglose de aportaciones a Caja de Ahorro</p>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Movimiento</th>
                            <th>Concepto</th>
                            <th class="text-center">Fecha de pago</th>
                            <th class="text-center">Semana de pago</th>
                            <th class="text-end">Importe</th>
                        </tr>
                        @foreach ($results as $row => $result)
                            <tr>
                                <td>{{ $row +1 }}</td>
                                <td>{{ $result->type }} #{{ $result->id }}</td>
                                <td>{{ $result->concept }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($result->paid_date)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <span class="badge text-bg-warning">{{ $result->start_date }}</span>
                                    |
                                    <span class="badge text-bg-warning">{{ $result->end_date }}</span>
                                </td>
                                <td class="text-end">{{ "$".number_format($result->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
</div>
@endsection