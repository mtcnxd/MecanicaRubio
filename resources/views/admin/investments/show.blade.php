@extends('includes.body')

@section('content')
<div class="window-container" style="margin-bottom: 50px;">
    @include('includes.alert')
    <h6 class="window-title shadow text-uppercase fw-bold">
        <span class="ms-3">Bitso wallet</span>
    </h6>
    <div class="window-body shadow py-4">
        <p class="fw-bold ps-2">Historial de inversion</p>
        <table class="table table-hover table-responsive" id="bitso">
            <thead class="thead-inverse">
                <tr>
                    <th>Fecha</th>
                    <th class="text-end">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investment->investmentData->sortByDesc('created_at') as $item)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        <td class="text-end">{{ Number::currency($item->amount) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection