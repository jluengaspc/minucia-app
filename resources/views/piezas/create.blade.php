@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nueva Pieza</h1>

    <form method="POST" action="{{ route('piezas.store') }}">
        @csrf

        @include('piezas.form')

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('piezas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection