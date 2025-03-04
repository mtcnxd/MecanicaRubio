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
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">EMPLEADO: </strong> {{ $employeeInfo->name }}
                            </div>
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">CORREO: </strong> {{ $employeeInfo->email }}
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">PUESTO: </strong> {{ $employeeInfo->depto }}
                            </div>
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">ANTIGUEDAD: </strong> {{ Carbon\Carbon::parse($employeeInfo->created_at)->format('d-m-Y') }}
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">CAJA DE AHORRO: </strong> {{ "$".number_format(abs($results->sum('amount')),2) }}
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
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->concept }}</td>
                                <td>{{ $result->end_date }}</td>
                                <td class="text-end">{{ "$".number_format(abs($result->amount), 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
</div>
@endsection