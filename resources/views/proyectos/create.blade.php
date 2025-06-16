@extends('layouts.app')

@section('content')
    <h2>Crear Proyecto</h2>
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre del proyecto" required>
        <button type="submit">Guardar</button>
    </form>
@endsection