@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Listado de egresos</h6>
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

        <div class="row m-1 mb-3 pb-3">
            <div class="col-md-2">
                <label class="fw-bold">Inicio</label>
                <input type="date" class="form-control" value="{{ $startDate }}" id="startDate">
            </div>

            <div class="col-md-2">
                <label class="fw-bold">Final</label>
                <input type="date" class="form-control" value="{{ $endDate }}" id="endDate">
            </div>

            <div class="col-md-2">
                <label class="fw-bold">Responsable</label>
                <select class="form-select" name="responsible" id="responsible">
                    <option value="0"> - Filtrar por responsable - </option>
                    <option value="3">Alexander Xix Ortiz</option>
                    <option value="2">Javier Rubio Magaña</option>
                    <option value="1">Marcos Tzuc Cen</option>
                </select>
            </div>

            <div class="col-md-2 mt-4">
                <button class="btn btn-success" id="applyFilter">
                    <x-feathericon-search class="table-icon" style="margin: -2px 5px 2px"/>
                    Buscar
                </button>
            </div>
        </div>
        
        <table class="table table-hover table-borderless" id="expenses" style="width:100%;">
            <thead>
                <tr>
                    <th width="400px">Egreso</th>
                    <th width="400px">Descripción</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Cantidad / Precio</th>
                    <th class="text-end">Total</th>
                    <th width="20px">&nbsp;</th>
                    <th width="20px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="row mt-3">
            <div class="col-md-3">
                <input type="button" value="Marcar como pagado" class="btn btn-sm btn-outline-success" id="markAsPaid">
                <input type="button" value="Sumar seleccionados" class="btn btn-sm btn-outline-success" id="sumAsTotal">
            </div>
            
            <div class="col">
                <span id="result" class="fw-bold"></span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="attached" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Archivo adjunto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img id="modal-image" src="{{ asset('image.gif') }}" alt="Image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
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

<script>
const startDate   = document.querySelector("#startDate");
const endDate     = document.querySelector("#endDate");
const responsible = document.querySelector("#responsible");
const applyFilter = document.querySelector('#applyFilter');

$("#sumAsTotal").on('click', function(){
    var total = 0.0;
    var checkboxGroup = $('input[type="checkbox"]');
    
    checkboxGroup.each(function() {
    if ($(this).prop('checked')) {
            total = total + parseFloat( $(this).data('bs-amount') );
        }
    });
    $("#result").text("TOTAL: " + numeral(total).format('$0,0.00') );
});

$("#markAsPaid").on('click', function(){
    var checkboxGroup = $('input[type="checkbox"]');
    var checkboxResult = [];

    checkboxGroup.each(function() {
    if ($(this).prop('checked')) {
            checkboxResult.push( $(this).attr('id') );
        }
    });

    $.ajax({
        url: "{{ route('markExpensesAsPaid') }}",
        method: 'POST',
        data: {
            checkboxResult:checkboxResult
        },
        success: function(response){
            showMessageAlert(response);
        }
    });
});

const table = new DataTable('#expenses', {
    processing: true,
    serverSide: true,
    searching: false,
    lengthChange:false,
    pageLength: 10,
    order: [3, 'asc'],
    ajax: {
        url: "{{ route('getDataTableExpenses') }}",
        data: function(data) {
            data.startDate = startDate.value;
            data.endDate   = endDate.value;
        }
    },
    columns:[
        {
            data:'name',
            orderable: false,
            render:function(row, type, data){
                return '<input type="checkbox" id="'+ data.id +'" class="form-check-input" style="margin-right:10px" data-bs-amount="'+ data.total +'"></input>' + row;
            }
        },{
            data:'description',
            orderable: false
        },{
            data:'status',
            render: function(row){
                var style = (row == 'Pendiente') ? 'bg-warning' : 'bg-success';
                return '<span class="badge '+ style +'">' + row + '</span>';
            }
        },{
            data:'created_at'
        },{
            data:'price',
            className: 'text-end',
            orderable: false
        },{
            data:'total',
            className: 'text-end',
            orderable: false,
            render: function (row){
                return numeral(row).format('$0,0.00');
            }
        },{
            data:'attach',
            orderable: false,
            render: function(row, type, data){
                if (data.attach){
                    return '<button class="btn attach" data-bs-target="#attached" data-bs-toggle="modal" id="'+ data.id +'" onclick="getImageAttached(this.id)">'+
                                '<x-feathericon-paperclip class="table-icon" style="margin: -2px 5px 0 0"/>'+
                           '</button>';           
                }
                else {
                    return '';
                }   
            }
        },{
            data: 'delete',
            orderable: false,
            render: function(row, type, data){
                return '<button class="btn" id="'+ data.id +'" onclick="removeItemExpense(this.id)">'+
                            '<x-feathericon-trash-2 class="table-icon" style="margin: -2px 5px 0 0"/>'+
                       '</button>';
            }
        }
    ]
});

applyFilter.addEventListener('click', function(){
    table.draw();
});

function removeItemExpense(buttonPressed){
    $.ajax({
        url:"{{ route('removeItemExpense') }}",
        method: 'POST',
        data: {
            id:buttonPressed
        },
        success:function(response){
            let image = '/storage/' + response.attach;
            $("#modal-image").attr('src', image);
        }
    });
}

function removeItemExpense(buttonPressed){
    $.ajax({
        url:"{{ route('removeItemExpense') }}",
        method: 'POST',
        data: {
            id:buttonPressed
        },
        success:function(response){
            showMessageAlert(response);
        }
    });
}

function getImageAttached(buttonPressed){
    $.ajax({
        url:"{{ route('getImageAttached') }}",
        method: 'POST',
        data: {
            id:buttonPressed
        },
        success:function(response){
            let image = '/storage/' + response.attach;
            $("#modal-image").attr('src', image);
        }
    });
}

function showMessageAlert(message){
    Swal.fire({
        text: message,
        icon: 'success',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        history.go();
    });
}
</script>
@endsection