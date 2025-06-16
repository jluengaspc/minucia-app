@extends('layouts.app')

@section('content')
    <h2>Crear Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        <button type="submit">Guardar</button>
    </form>
@endsection