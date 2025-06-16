@extends('layouts.app')

@section('content')
    <h2>Usuarios</h2>
    <a href="{{ route('usuarios.create') }}">Crear usuario</a>

    <ul>
        @foreach ($usuarios as $usuario)
            <li>
                 {{ $usuario->email }}
                <a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection