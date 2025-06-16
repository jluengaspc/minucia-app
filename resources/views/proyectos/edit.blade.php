@extends('layouts.app')

@section('content')
    <h2>Editar Proyecto</h2>
    <form action="{{ route('proyectos.update', $proyecto) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $proyecto->nombre }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection