@extends('includes.body')

@section('menu')
@include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <strong>Vehiculos por marca</strong>
                </div>
                <div class="card-body p-1">
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
</div>
@endsection
