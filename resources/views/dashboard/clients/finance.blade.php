@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="main-content">
    <h4 style="display: flex; justify-content: space-between;">
        Servicios/Pagos
        <a class="btn btn-outline-secondary" href="{{ route('clients.index') }}">
            <x-feathericon-arrow-left class="window-title-icon"/>
        </a>
    </h4>
    <hr>
    @include('includes.div_warning')
    <div class="row">
        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Ingreso de servicios entregados</h6>
                <x-feathericon-dollar-sign class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                {{ "$".number_format($services->sum('total'), 2) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Resumen de servicios</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                <ul class="list-group list-group-flush">
                    @foreach ($resumen as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-3 fw-bold" style="width: 150px">
                                {{ $item->status }}
                            </div>
                            <div class="ms-3" style="width: 150px">
                                {{ $item->count }}
                            </div>
                            <div class="ms-3 text-end" style="width: 150px">
                                {{ "$".number_format($item->total, 2) }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 mt-4">
        @foreach ($services as $service)
            <div class="row border p-3 m-2" style="background-color: var(--gray-100)">
                <div class="col-md-6">{{ $service->fault }}</div>
                <div class="col">
                    <span class="text-center" style="background-color: var(--amber-400); width: 150px; padding:2px; border-radius: 15px; display:block;">{{ $service->status }}</span>
                </div>
                <div class="col text-end">{{ number_format($service->total, 2) }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
