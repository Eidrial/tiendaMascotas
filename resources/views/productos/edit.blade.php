@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">

@section('content')

    <div class="product-form-container">
        <h1>Editar producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required>{{ $producto->descripcion }}</textarea>

            <label for="precio">Precio (€):</label>
            <input type="number" id="precio" name="precio" value="{{ $producto->precio }}" required step="0.01" min="0">

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{ $producto->stock }}" required min="0">

            <label for="imagen">Imagen del producto:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <input type="submit" value="Actualizar Producto">
            <a href="{{ route('productos.index') }}" class="back-button">Volver a la lista</a>
        </form>
    </div>
@endsection