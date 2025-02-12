@extends('includes.body')

@section('menu')
@include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="row">

        <div class="col-md-3">
            <div class="widget-simple-body bg-white border" style="max-height:250px; overflow-y: scroll;">
                <ul class="list-group list-group-flush">
                    @foreach ($statistics as $brand)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">{{ $brand->brand }}</div>
                            <span class="badge text-bg-warning rounded-pill">{{ $brand->count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    
    </div>
</div>
@endsection
