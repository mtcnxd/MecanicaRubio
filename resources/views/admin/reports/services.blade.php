@extends('includes.body')

@section('content')
<div class="window-container">
    <h6 class="window-title shadow text-uppercase fw-bold"><span class="ms-3">Ingresos del mes</span></h6>
    <div class="window-body shadow">
        <table class="table border table-hover bg-white">
            <thead>
                <th width="5%">Folio</th>
                <th width="10%">Fecha</th>
                <th>Concepto</th>
                <th class="text-end">Ingresos</th>
            </thead>
            <tbody class="bg-white">
                @foreach ($list as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->finished_date }}</td>
                        <td>
                            <a href="{{ route('services.show', $row->id) }}">{{ $row->brand }} {{ $row->model }}</a>
                        </td>
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
