@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">

@section('content')

<div class="login-container">

    <img src="{{ asset('img/paw.svg') }}" alt="Logo Tienda de Mascotas" class="logo">

    <h1>Editar usuario</h1>

    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST" class="formulario-editar-usuario">
        @csrf
        @method('PUT')

        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" value="{{ old('name', $usuario->name) }}" required>

        <label for="email">Correo electrónico</label>
        <input id="email" type="email" name="email" value="{{ old('email', $usuario->email) }}" required>

        <label for="role">Rol</label>
        <select id="role" name="role" required>
            <option value="user" {{ $usuario->role == 'user' ? 'selected' : '' }}>Usuario</option>
            <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>

        <input class="btn-comprar" type="submit" value="Guardar cambios">
        <a href="{{ route('admin.usuarios') }}" class="back-button">Volver atrás</a>
    </form>
</div>

@endsection
