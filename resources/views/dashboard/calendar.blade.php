@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body bg-white">
        <label class="window-body-form">Calendario de eventos / servicios</label>
        <form action="{{ route('autos.store') }}" method="POST" class="border pt-5 pb-4">
           {{ $today }}

           @for ($i=1; $i<=$days; $i++)
               <div class="day">{{ $i }}</div>
           @endfor
        </form>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

