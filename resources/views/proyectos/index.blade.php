@extends('layouts.app')

@section('content')
    <h2>Listado de Proyectos</h2>
    <a href="{{ route('proyectos.create') }}">Crear nuevo proyecto</a>
    <ul>
        @foreach ($proyectos as $proyecto)
            <li>
                {{ $proyecto->nombre }}
                <a href="{{ route('proyectos.edit', $proyecto) }}">Editar</a>
                <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection