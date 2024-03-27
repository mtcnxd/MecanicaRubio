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
                <input type="date" class="form-control" value="{{ $startDate }}">
            </div>

            <div class="col-md-2">
                <label class="fw-bold">Final</label>
                <input type="date" class="form-control" value="{{ $endDate }}">
            </div>

            <div class="col-md-2 mt-4">
                <button class="btn btn-success" id="applyFilter">
                    <x-feathericon-search class="table-icon" style="margin: -2px 5px 2px"/>
                    Buscar
                </button>
            </div>
        </div>
        <p class="p-2 pb-0 pt-0">Se encontraron {{ count($expenses) }} registros</p>
        <hr>
        <table class="table table-hover table-borderless" id="expenses">
            <thead>
                <tr>
                    <th>Egreso</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Cantidad / Precio</th>
                    <th class="text-end">Total</th>
                    <th width="20px">&nbsp;</th>
                    <th width="20px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $expense_total = 0;
                @endphp
                @foreach ($expenses as $expense)
                @php
                    $total = $expense->amount * $expense->price;
                    $expense_total += $total;
                @endphp
                <tr>
                    <td>
                        @if ($total >= 1000)
                            <x-feathericon-alert-triangle class="table-icon" style="margin: -2px 5px 0 0; color:red;"/>
                        @else 
                            <x-feathericon-check class="table-icon" style="margin: -2px 5px 0 0"/>
                        @endif
                        {{ $expense->name }}
                    </td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <span class="badge {{ ($expense->status == 'Pendiente') ? 'bg-warning' : 'bg-success' }}">{{ $expense->status }}</span>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($expense->created_at)) }}</td>
                    <td>{{ $expense->amount }} / {{ '$'.number_format($expense->price, 2) }}</td>
                    <td class="text-end">{{ '$'.number_format($total, 2) }}</td>
                    <td class="text-end">
                        @if ($expense->attach)
                            <button type="submit" class="btn attach" data-bs-target="#attached" data-bs-toggle="modal" id="{{ $expense->id }}">
                                <x-feathericon-paperclip class="table-icon" style="margin: -2px 5px 0 0"/>
                            </button>
                        @endif
                    </td>
                    <td class="text-end">
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">
                                <x-feathericon-trash-2 class="table-icon" style="margin: -2px 5px 0 0"/>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-top">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="text-end fw-bold">TOTAL:</td>
                    <td class="text-end fw-bold">{{ '$'.number_format($expense_total, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    const buttonsArray = document.getElementsByClassName('attach');

    $(buttonsArray).on('click', function(){
        const buttonPressed = this.id;

        $.ajax({
            url:"{{ route('getImageAttached') }}",
            method: 'POST',
            data: {
                id:buttonPressed
            },
            success:function(response){
                console.log(response.attach);
                
                let image = '/storage/' + response.attach;
                $("#modal-image").attr('src', image);
            }
        });

    });

</script>
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