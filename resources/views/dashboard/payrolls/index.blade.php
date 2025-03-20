@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Listado de nominas</h6>
        <x-feathericon-dollar-sign class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        @include('includes.div_warning')
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
                    <th width="50px">Folio</th>
                    <th width="350px">Empleado</th>
                    <th width="250px">Tipo</th>
                    <th width="300px">Periodo</th>
                    <th width="200px">Elaborado</th>
                    <th>Estatus</th>
                    <th class="text-end">Total</th>
                    <th width="30px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaryData as $salary)
                <tr>
                    <td>{{ $salary->id }}</td>
                    <td>
                        <span class="material-symbols-outlined" style="position:relative; top:5px; margin-right:6px;">badge</span>
                        <a href="{{ route('payroll.show', $salary->id) }}">
                            {{ $salary->name }}
                        </a>
                    </td>
                    <td>
                        {{ $salary->type }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($salary->start_date)->format('d-m-Y') }} | {{ Carbon\Carbon::parse($salary->end_date)->format('d-m-Y') }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($salary->created_at)->format('d-m-Y') }}
                    </td>
                    <td>
                        @if ($salary->status == 'Pagado')
                            <span class="badge rounded-pill text-bg-success">{{ $salary->status }}</span>
                        @else
                            @if ($salary->status == 'Cancelado')
                                <span class="badge rounded-pill text-bg-secondary">{{ $salary->status }}</span>    
                            @else
                                <span class="badge rounded-pill text-bg-warning">{{ $salary->status }}</span>
                            @endif
                        @endif
                    </td>
                    <td class="text-end">{{ "$".number_format($salary->total, 2) }}</td>
                    <td>
                        <div class="dropdown">
                            @if ($salary->status != 'Pagado')
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" style="margin-top:-3px;">
                                <x-feathericon-more-vertical style="height:20px;"/>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-action="pay" data-id="{{ $salary->id }}">Pagar</a></li>
                                <li><a class="dropdown-item" href="#" data-action="cancell" data-id="{{ $salary->id }}">Cancelar</a></li>
                                <li><a class="dropdown-item" href="#" data-action="delete" data-id="{{ $salary->id }}">Eliminar</a></li>
                            </ul>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
$(".dropdown-item").on('click', function(){
    const buttonGroup = $(this);
    $.ajax({
        url: "{{ route('manageSalaries') }}",
        method: 'POST',
        data: {
            id:buttonGroup.data('id'),
            action:buttonGroup.data('action')
        },
        success: function(response){
            showMessageAlert(response.message);
        }
    });

});

function showMessageAlert(message){
    Swal.fire({
        text: message,
        icon: 'success',
        confirmButtonText: 'Aceptar'
    }).then( () => {
        history.go();
    })
}
</script>
@endsection