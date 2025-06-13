@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/tienda.css') }}">
    <div class="bienvenida-wrapper">
        <div class="bienvenida">
            <h1>Bienvenido a la página de <span class="nombre"><b>Mascotitas</b></span>, la tienda para los amantes de los
                animales</h1>
            <a href="{{ route('login') }}">LOGUEARSE</a>
        </div>
    </div>

@endsection