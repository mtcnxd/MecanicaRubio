@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')
    <div class="row col-md-12">
        <div class="col-md-3">
            <h6 class="window-title" style="display: flex; justify-content: space-between; align-items: center;">
                <span>Ingreso generados</span>
                <x-feathericon-dollar-sign class="window-title-icon"/>
            </h6>
            <div class="window-body bg-white text-center center-vertically" style="min-height: 100px;">
                <h3>{{ Number::currency($service->sum('total')) }}</h3>
            </div>
        </div>
        <div class="col-md-3">            
            <h6 class="window-title" style="display: flex; justify-content: space-between; align-items: center;">
                <span>Servicios ingresados</span>
                <x-feathericon-tool class="window-title-icon"/>
            </h6>
            <div class="window-body bg-white text-center center-vertically" style="min-height: 100px;">
                <h3>{{ $service->count() }}</h3>
            </div>
        </div>
    </div>

    <div class="row col-md-12 mt-4">
        @foreach ($service as $item)
            @foreach ($item->serviceItems as $serviceItem)
                <div class="row border p-3 m-2 shadow-sm" style="background-color: var(--gray-100)">
                    <div class="col-md-4">{{ $serviceItem->item }}</div>
                    <div class="col-md-3">{{ $serviceItem->supplier }}</div>
                    <div class="col text-end">{{ Number::currency($serviceItem->price) }}</div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
