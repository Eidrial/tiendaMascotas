@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilosFormularios.css') }}">

@section('content')

    <div class="bienvenida-wrapper">
        <div class="bienvenida">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <table class="tabla-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-capitalize">{{ $user->role }}</td>
                            <td class="acciones">
                                <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn-editar">Editar</a>

                                <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST"
                                    class="form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn-eliminar" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           <a href="{{ route('user.admin') }}" class="btn-volver" style="margin-top: 2rem;">← Volver atrás</a>

        </div>
    </div>
@endsection