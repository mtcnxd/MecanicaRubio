@extends('index')

@section('content')
<div class="container">
    <div class="logo">
        <img src="images/mainlogo.png" width="350px">
    </div>
    <div class="div_menu">
        <ul class="main_menu">
            <li>
                <a href="#" class="btn_menu">Servicios</a>
            </li>
            <li>
                <a href="#" class="btn_menu">Promociones</a>
            </li>
            <li>
                <a href="#" class="btn_menu">Quienes somos</a>
            </li>            
            <li>
                <a href="{{ route('login') }}" class="btn_menu">Mis servicios</a>
            </li>
        </ul>
    </div>
    <div class="slide">
        <img src="images/slide.webp" width="100%">
        <div class="slogan">
            <h1>Tu conduces, nosotros nos encargamos del resto</h1>
        </div>
    </div>
</div>
@endsection