@extends('layouts.app')

@section('content')
    <h2>Reporte de piezas pendientes agrupadas por proyecto</h2>

    @forelse ($pendientes as $proyecto => $piezas)
        <h3>{{ $proyecto }}</h3>
        <ul>
            @foreach ($piezas as $pieza)
                <li>{{ $pieza->nombre }} - Peso: {{ $pieza->peso_teorico }}kg</li>
            @endforeach
        </ul>
    @empty
        <p>No hay piezas pendientes.</p>
    @endforelse
@endsection