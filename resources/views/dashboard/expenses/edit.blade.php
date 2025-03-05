@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>

    <div class="window-body bg-white">
        <h4 class="ps-2">Detalles del movimiento</h4>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card -p2">
                    <div class="card-body">
                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Concepto: </strong> {{ $expense->name }}
                            </div>
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Descripcion: </strong> {{ $expense->description }}
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Cantidad: </strong> {{ $expense->amount }}
                            </div>
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Precio: </strong> {{ "$".number_format($expense->price, 2) }}
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Responsable: </strong> {{ $expense->responsible }}
                            </div>
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Status: </strong> {{ $expense->status }}
                            </div>
                        </div>

                        <div class="row m-0 p-2">
                            <div class="row col-md-6">
                                <strong class="p-0 fs-8">Status: </strong>
                                <img src="/public/uploads/expenses/{{ $expense->attach }}" >
                            </div>
                        </div>

                        <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="file" class="form-control" name="attach">
                            <button type="submit" class="btn btn-success">
                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection