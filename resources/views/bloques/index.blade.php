@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Bloques</h2>
    <a href="{{ route('bloques.create') }}" class="btn btn-primary mb-3">Nuevo Bloque</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bloques as $bloque)
            <tr>
                <td>{{ $bloque->nombre }}</td>
                <td>{{ $bloque->proyecto->nombre }}</td>
                <td>
                    <a href="{{ route('bloques.edit', $bloque) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('bloques.destroy', $bloque) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar bloque?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bloques->links() }}
</div>
@endsection