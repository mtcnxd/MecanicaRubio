@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="shadow-sm main-content">
    <div class="window-title-bar">
        <h6 class="window-title-text">Dashboard</h6>
        <x-feathericon-user class="window-title-icon"/>
    </div>
    <div class="window-body">
        <div class="row p-3">
            <div class="col-md-4 border">
                Ingresos
            </div>
            <div class="col-md-4 border">
                Egresos
            </div>
            <div class="col-md-4 border">
                Pendientes
            </div>
        </div>
    </div>
</div>
@endsection