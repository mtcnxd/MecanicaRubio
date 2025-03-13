@extends('includes.body')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    @include('includes.div_warning')
    <div class="row col-md-6">
        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Ingreso generados</h6>
                <x-feathericon-dollar-sign class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm text-center" style="min-height: 100px;">
                <h3>{{ "$".number_format($services->sum('total'), 2) }}</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Servicios ingresados</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm text-center" style="min-height: 100px;">
                <h3>{{ $services->count() }}</h3>
            </div>
        </div>
    </div>
    
    <div class="row col-md-12 mt-4">
        @foreach ($items as $item)
            <div class="row border p-3 m-2" style="background-color: var(--gray-100)">
                <div class="col-md-4">{{ $item->item }}</div>
                <div class="col-md-3">{{ $item->supplier }}</div>
                <div class="col text-end">{{ "$".number_format($item->price, 2) }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
