@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">
@section('content')

    

    <div class="login-container">
        {{-- Opcional: logo de la tienda --}}
        <img src="{{ asset('img/paw.svg') }}" alt="Logo Tienda de Mascotas" class="logo">

        <h1>Iniciar Sesión</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required autocomplete="email" autofocus>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <input type="submit" value="Entrar">
            <a href="{{ route('home') }}" class="back-button">Volver atrás</a>
        </form>

        <div class="register-link">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}">Regístrate aquí</a>
        </div>
    </div>
@endsection