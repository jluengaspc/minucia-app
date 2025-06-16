@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Bloque</h2>

    <form action="{{ route('bloques.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="proyecto_id" class="form-label">Proyecto</label>
            <select name="proyecto_id" class="form-control" required>
                <option value="">Seleccione un proyecto</option>
                @foreach($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('bloques.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection