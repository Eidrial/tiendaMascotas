@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">
<link rel="stylesheet" href="{{ asset('css/tienda.css') }}">

<div class="modal-container">
    <img src="{{ asset('img/paw.svg') }}" alt="Logo Tienda de Mascotas" class="logo">
    <h2>¿Estás seguro de que quieres eliminar este producto?</h2>
    <p class="warning-text">Esta acción no se puede deshacer.</p>

    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="SÍ" class="danger-button">
    </form>

    <a href="{{ route('user.admin') }}" class="back-button">NO</a>
</div>
@endsection
