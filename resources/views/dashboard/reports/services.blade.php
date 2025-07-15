@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <h6 class="border-bottom mb-4 p-2 pb-3 fw-bold text-uppercase">Ingresos del mes</h6>
    <table class="table border table-hover">
        <thead>
            <thead>
                <th width="40px">#</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th class="text-end">Ingresos</th>
            </thead>
        </thead>
        <tbody class="bg-white">
            @foreach ($list as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>
                        <a href="{{ route('services.show', $row->id) }}">{{ $row->brand }} {{ $row->model }}</a>
                    </td>
                    <td>{{ $row->finished_date }}</td>
                    <td class="text-end">{{ "$".number_format($row->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td class="text-end fw-bold">{{ "$".number_format($list->sum('price'), 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
