@extends('includes.body')

@section('content')
<div class="main-content shadow">
    <h6 class="title-bar text-uppercase fw-bold">Ingresos del mes</h6>
    <div class="window-body pb-3 bg-white">
        <table class="table border table-hover">
            <thead>
                <th width="40px">#</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th class="text-end">Ingresos</th>
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
</div>
@endsection
