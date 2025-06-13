@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">
    
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="register-container">
        {{-- Opcional: logo de la tienda --}}
        <img src="{{ asset('img/paw.svg') }}" alt="Logo Tienda de Mascotas" class="logo">

        <h1>Registrarse</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nombre completo:</label>
            <input type="text" id="name" name="name" required autocomplete="name" autofocus>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required autocomplete="email">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">

            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                autocomplete="new-password">

            <input type="submit" value="Registrarse">
        </form>

        <div class="register-link">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}">Iniciar sesión</a>
        </div>

    </div>

@endsection