@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{ $details->brand }} {{ $details->model }} {{ $details->year }}
        </div>
    </div>
    
    
    @foreach ($details->services as $detail)
        <div class="row border">
            <div class="col">{{ isset($detail->odometer) ? $detail->odometer : '' }} KM</div>
            <div class="col-md-4">{{ $detail->fault }}</div>
            <div class="col">{{ $detail->entry_date->format('d M Y') }}</div>
            <div class="col">{{ $detail->finished_date->format('d M Y') }}</div>
            <div class="col text-end">${{ number_format($detail->total, 2) }}</div>
        </div>
    @endforeach
</div>    
@endsection