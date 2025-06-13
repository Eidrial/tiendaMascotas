@extends('layouts.app')

@section('content')
    <h2 class="titulo">Editar Usuario</h2>

    <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="name" value="{{ $usuario->name }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $usuario->email }}" required>

        <label>Rol:</label>
        <select name="role">
            <option value="user" {{ $usuario->role == 'user' ? 'selected' : '' }}>Usuario</option>
            <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
@endsection
