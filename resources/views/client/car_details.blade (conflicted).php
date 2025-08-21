@extends('index')

@section('content')
<div class="container">
    @foreach ($details as $detail)
        <div class="row">
            <div class="col-md-6">
                <a href="">{{ $detail }}</a>
            </div>
        </div>
    @endforeach
</div>    
@endsection

