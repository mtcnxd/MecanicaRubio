@extends('index')

@section('content')
<div class="container">
    @foreach ($cars as $car)
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('clientServices.show', $car->id) }}">{{ $car->carName() }} {{ $car->year }}</a>
            </div>
        </div>
    @endforeach
</div>    
@endsection

