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
    @if ( session('message') )
        <div class="alert alert-warning alert-dismissible fade show">
            <strong>Mensaje: </strong>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Desglose</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                {{ "$".number_format($services->sum('total'), 2) }}
            </div>
        </div>
        <div class="col-md-7">
            <div class="window-title-bar shadow-sm">
                <h6 class="window-title-text">Desglose</h6>
                <x-feathericon-tool class="window-title-icon"/>
            </div>
            <div class="window-body bg-white shadow-sm">
                @foreach ($resumen as $item)
                    <ul>
                        <li>
                            {{ $item->status }} {{ $item->count }} {{ $item->total }}
                        </li>
                    </ul>
                @endforeach
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
                <div class="col">{{ $service->total }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
