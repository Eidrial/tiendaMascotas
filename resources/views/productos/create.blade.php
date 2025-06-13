@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">

@section('content')

    <div class="product-form-container">
        <h1>Crear producto</h1>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>

            <label for="precio">Precio (€):</label>
            <input type="number" id="precio" name="precio" placeholder="Precio" required step="0.01" min="0">

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" placeholder="Stock" required min="0">

            <label for="imagen">Imagen del producto:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <input type="submit" value="Añadir producto">
            <a href="{{ route('productos.index') }}" class="back-button">Volver a la lista</a>
        </form>
    </div>
@endsection