@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
   
    <div class="col-md-6">
        <div class="window-body shadow p-4 mb-4 bg-white rounded">
            <form action="{{ route('reports.employees') }}" method="GET">
                @csrf
                <label class="text-uppercase fs-8 fw-bold mb-2">Seleccione un empleado para los detalles</label>
                <div class="row">
                    <div class="col-md-10">
                        <select name="employee" id="employee" class="form-select">
                            <option value="">- Seleccione un empleado -</option>
                            @foreach ( App\Models\Employee::all() as $employeesList)
                                <option value="{{ $employeesList->user->id }}">{{ $employeesList->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success" id="search">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @isset($salaries)
        <h6 class="window-title-bar text-uppercase fw-bold">Reporte</h6>
        <div class="window-body shadow p-4 bg-white">
            <div class="row m-0 p-2">
                <div class="col-md-6">
                    <label class="text-uppercase fs-8 fw-bold">Nombre</label>
                    <input type="text" class="form-control" value="{{ $employee->user->name }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Puesto</label>
                    <input type="text" class="form-control" value="{{ $employee->depto }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Correo</label>
                    <input type="text" class="form-control" value="{{ $employee->user->email }}" disabled>
                </div>
            </div>
            <div class="row m-0 p-2">
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Ingreso</label>
                    <input type="text" class="form-control" value="{{ $employee->user->created_at->format('d/m/Y') }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Antigüedad</label>
                    <input type="text" class="form-control" value="{{ $employee->user->created_at->diffInMonths() }} meses" disabled>
                </div>
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Vacaciones tomadas</label>
                    <input type="text" class="form-control" value="8" disabled>
                </div>
                <div class="col-md-3">
                    <label class="text-uppercase fs-8 fw-bold">Vacaciones pendientes</label>
                    <input type="text" class="form-control" value="8" disabled>
                </div>
            </div>
                
            <p class="text-uppercase fs-7 mt-4 mb-1">Detalles de Nomina</p>
            <div class="col-md-12 border-top border-bottom bg-body-tertiary mb-4" style="height: 700px; overflow-y: scroll">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Movimiento</th>
                                <th class="text-center">Fecha de pago</th>
                                <th class="text-center">Periodo de pago</th>
                                <th class="text-end">Importe</th>
                            </tr>
                            @php
                                $count = 1;
                                $grandTotal = 0;
                            @endphp

                            @foreach ($salaries->where('status', 'Pagado') as $result)
                                @foreach ($result->salaryDetails->where('concept', 'Caja de ahorro') as $item)
                                    <tr>
                                        <td>{{ $count ++ }}</td>
                                        <td>
                                            <a href="{{ route('payroll.show', $result->id) }}">{{ $result->type }} #{{ $result->id }}</a>
                                        </td>
                                        <td class="text-center">{{ $result->paid_date->format('d M Y') }}</td>
                                        <td class="text-center">
                                            <span class="badge text-bg-warning">{{ $result->start_date }}</span> | <span class="badge text-bg-warning">{{ $result->end_date }}</span>
                                        </td>
                                        <td class="text-end">
                                            @php
                                                $grandTotal += $result->salaryDetails->where('concept','Caja de ahorro')->sum('amount');
                                            @endphp

                                            ${{ number_format($result->salaryDetails->where('concept','Caja de ahorro')->sum('amount'), 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end fw-bold">
                                    Total: ${{ number_format($grandTotal, 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endisset
</div>
@endsection