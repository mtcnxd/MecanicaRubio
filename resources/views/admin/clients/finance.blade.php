@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="row col-md-12">
        <div class="col-md-3">
            <h6 class="window-title-bar" style="display: flex; justify-content: space-between; align-items: center;">
                <span>Ingreso generados</span>
                <x-feathericon-dollar-sign class="window-title-icon"/>
            </h6>
            <div class="window-body bg-white text-center center-vertically" style="min-height: 100px;">
                <h3>{{ "$".number_format($services->sum('total'), 2) }}</h3>
            </div>
        </div>
        <div class="col-md-3">            
            <h6 class="window-title-bar" style="display: flex; justify-content: space-between; align-items: center;">
                <span>Servicios ingresados</span>
                <x-feathericon-tool class="window-title-icon"/>
            </h6>
            <div class="window-body bg-white text-center center-vertically" style="min-height: 100px;">
                <h3>{{ $services->count() }}</h3>
            </div>
        </div>
    </div>
    
    <div class="row col-md-12 mt-4">
        @foreach ($items as $item)
            <div class="row border p-3 m-2 shadow-sm" style="background-color: var(--gray-100)">
                <div class="col-md-4">{{ $item->item }}</div>
                <div class="col-md-3">{{ $item->supplier }}</div>
                <div class="col text-end">{{ "$".number_format($item->price, 2) }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
