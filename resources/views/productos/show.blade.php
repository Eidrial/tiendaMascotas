@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/tienda.css') }}">

@section('content')

    <div class="product-detail-container">
        <h1>{{ $producto->nombre }}</h1>
        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
            class="product-image">
        <p class="product-description">{{ $producto->descripcion }}</p>
        <p class="product-price"><b>Precio:</b> €{{ $producto->precio }}</p>
        <p class="product-stock"><b>Stock disponible:</b> {{ $producto->stock }}</p>
        <a href="{{ route('productos.index') }}" class="back-button">Volver a la lista</a>
    </div>
@endsection