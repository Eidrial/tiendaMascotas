@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/tienda.css') }}">

@section('content')

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <input type="submit" value="Cerrar sesión" class="btn-simple logout">
    </form>

    <h2 class="titulo"><span class="titulo__color">MASCOTITAS</span> - TIENDA ONLINE</h2>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif


    <div class="grid-productos">
        @foreach ($productos as $producto)
            <div class="card-producto">
                <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                
                <div class="contenido">
                    <h3>{{ $producto->nombre }}</h3>
                    <p>{{ $producto->descripcion }}</p>
                    <p>
                        @if ($producto->stock > 0)
                            <span class="stock">Stock disponible:</span> {{ $producto->stock }}
                        @else
                            <span class="sin-stock">No hay stock disponible</span>
                        @endif
                    </p>
                    <p><b>{{ $producto->precio }} €</b></p>
                </div>

                <form action="{{ route('productos.comprar', $producto->id) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn-comprar" 
                           value="{{ $producto->stock > 0 ? 'Comprar' : 'Sin stock' }}" 
                           {{ $producto->stock <= 0 ? 'disabled' : '' }}>
                </form>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $productos->links('pagination::simple-default') }}
    </div>
@endsection
