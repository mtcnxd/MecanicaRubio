@extends('includes.body')

@section('content')
<div class="window-container">
    <div class="col-md-7">
        <h6 class="window-title-bar text-uppercase fw-bold">Gasto</h6>
        <div class="window-body shadow p-4 bg-white">
            <h4 class="ps-2 text-uppercase fs-6">Detalles del Egreso</h4>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-1">
                            <div class="row m-0 p-2">
                                <div class="col-md-12">
                                    <strong class="fs-6">Concepto</strong>
                                    <input type="text" class="form-control" value="{{ $expense->concept }}" disabled>
                                </div>
                            </div>

                            <div class="row m-0 p-2">
                                <div class="col-md-6">
                                    <strong class="fs-6">Cantidad</strong>
                                    <input type="text" class="form-control" value="{{ $expense->amount }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <strong class="fs-6">Precio</strong>
                                    <input type="text" class="form-control" value="{{ "$".number_format($expense->price, 2) }}" disabled>
                                </div>
                            </div>

                            <div class="row m-0 p-2">
                                <div class="col-md-6">
                                    <strong class="fs-6">Responsable</strong>
                                    <input type="text" class="form-control" value="{{ $expense->name }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <strong class="fs-6">Status</strong>
                                    <input type="text" class="form-control" value="{{ $expense->status }}" disabled>
                                </div>
                            </div>

                            <div class="row m-0 p-2">
                                <div class="col-md-12">
                                    <strong class="fs-6">Descripcion</strong>
                                    <textarea cols="60" rows="5" class="form-control" disabled>{{ $expense->description }}</textarea>
                                </div>
                            </div>

                            <hr>
                            <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row m-0 p-2">
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="expense_date" value="{{ $expense->expense_date }}">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="attach">
                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <div class="col-md-6 mt-3 text-end">
                                            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Atras</a>
                                            <button type="submit" class="btn btn-success">
                                                <x-feathericon-save class="table-icon" style="margin: -2px 5px 2px"/>
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if ($expense->attach)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="row col-md-6">
                                <div class="card p-2">
                                    <img src="/public/uploads/expenses/{{ $expense->attach }}" width="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection