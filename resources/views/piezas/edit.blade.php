@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pieza</h1>

    <form method="POST" action="{{ route('piezas.update', $pieza) }}">
        @csrf
        @method('PUT')

        @include('piezas.partials.form', ['pieza' => $pieza])

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('piezas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection