@extends('layouts.app')

@section('content')
    <h2>Editar Usuario</h2>
    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="email" name="email" value="{{ $usuario->email }}" required>
        <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
        <button type="submit">Actualizar</button>
    </form>
@endsection