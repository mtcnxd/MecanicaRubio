@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Listado de nominas</h6>
        <x-feathericon-dollar-sign class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @if ( session('message') )
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ( session('error') )
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Mensaje: </strong>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('payroll.index') }}" method="POST">
            @csrf
            @method('GET')

            <div class="row m-1 mb-3 pb-3">
                <div class="col-md-2">
                    <label class="fw-bold">Inicio</label>
                    <input type="date" class="form-control" name="startDate" id="startDate" value="{{ $startDate }}">
                </div>

                <div class="col-md-2">
                    <label class="fw-bold">Final</label>
                    <input type="date" class="form-control" name="endDate" id="endDate" value="{{ $endDate }}">
                </div>

                <div class="col-md-2">
                    <label class="fw-bold">Responsable</label>
                    <select class="form-select" name="employee" id="employee">
                        <option value="0"> - Filtrar por responsable - </option>
                        <option value="1">Alexander Xix Ortiz</option>
                        <option value="3">Javier Rubio Magaña</option>
                        <option value="2">Marcos Tzuc Cen</option>
                    </select>
                </div>

                <div class="col-md-2 mt-4">
                    <button class="btn btn-success" id="applyFilter">
                        <x-feathericon-search class="table-icon" style="margin: -2px 5px 2px"/>
                        Buscar
                    </button>
                </div>
            </div>
        </form>
        
        <table class="table table-hover table-borderless" id="expenses" style="width:100%;">
            <thead>
                <tr>
                    <th width="400px">Fecha</th>
                    <th width="400px">Empleado</th>
                    <th>Estatus</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaryData as $salary)
                @php
                    $total = $salary->salary + ($salary->hours * $salary->price) + $salary->bonds - $salary->discount; 
                @endphp
                <tr>
                    <td>
                        <a href="http://">
                            {{ Carbon\Carbon::parse($salary->created_at)->format('d-m-Y') }}
                        </a>
                    </td>
                    <td>{{ $salary->name }}</td>
                    <td>{{ $salary->status }}</td>
                    <td class="text-end">{{ "$".number_format($total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
@endsection