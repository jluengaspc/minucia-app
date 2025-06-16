@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Piezas</h1>
    <a href="{{ route('piezas.create') }}" class="btn btn-primary mb-3">Registrar Nueva Pieza</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Peso Teórico</th>
                <th>Peso Real</th>
                <th>Estado</th>
                <th>Bloque</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($piezas as $pieza)
                <tr>
                    <td>{{ $pieza->nombre }}</td>
                    <td>{{ $pieza->peso_teorico }}</td>
                    <td>{{ $pieza->peso_real ?? '-' }}</td>
                    <td>{{ $pieza->estado }}</td>
                    <td>{{ $pieza->bloque_id }}</td>
                    <td>{{ $pieza->fecha_registro }}</td>
                    <td>
                        <a href="{{ route('piezas.edit', $pieza) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('piezas.destroy', $pieza) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar esta pieza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection