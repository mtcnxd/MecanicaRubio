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
                <img src="/storage/6vG0gjpq3M8GWkZCONUyqdB7d7pALZEFoJ9GLw3Q.jpg" alt="image">
            </div>
            <div class="col-md-4 border">
                <img src="/storage/B8ebywqyirQ3sdM07DHkZFtclIy5UEP6k25BcHft.jpg" alt="image">
            </div>
        </div>
    </div>
</div>
@endsection