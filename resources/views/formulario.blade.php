@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registro de piezas</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('formulario.store') }}">
        @csrf

        {{-- Proyecto --}}
        <label>Proyecto:</label>
        <select name="proyecto" id="proyecto" onchange="cargarBloques()" required>
            <option value="">Seleccione un proyecto</option>
            @foreach($proyectos as $p)
                <option value="{{ $p->codigo }}">{{ $p->nombre }}</option>
            @endforeach
        </select>

        {{-- Bloque --}}
        <label>Bloque:</label>
        <select name="bloque" id="bloque" onchange="cargarPiezas()" required>
            <option value="">Seleccione un bloque</option>
        </select>

        {{-- Pieza --}}
        <label>Pieza:</label>
        <select name="pieza_id" id="pieza" onchange="mostrarPeso()" required>
            <option value="">Seleccione una pieza</option>
        </select>

        {{-- Peso teórico --}}
        <div>Peso teórico: <span id="pesoTeorico">0</span> kg</div>

        {{-- Peso real --}}
        <label>Peso real:</label>
        <input type="number" step="0.01" name="peso_real" id="peso_real" required>

        {{-- Diferencia --}}
        <div>Diferencia: <span id="diferencia">0</span> kg</div>

        <br>
        <button type="submit">Registrar</button>
    </form>
</div>

<script>
    const proyectos = @json($proyectos);

    function cargarBloques() {
        const proyectoCodigo = document.getElementById('proyecto').value;
        const proyecto = proyectos.find(p => p.codigo === proyectoCodigo);
        const bloqueSelect = document.getElementById('bloque');
        bloqueSelect.innerHTML = '<option value="">Seleccione un bloque</option>';

        if (proyecto) {
            proyecto.bloques.forEach(b => {
                const option = document.createElement('option');
                option.value = b.id;
                option.text = b.nombre;
                bloqueSelect.appendChild(option);
            });
        }

        document.getElementById('pieza').innerHTML = '<option value="">Seleccione una pieza</option>';
        document.getElementById('pesoTeorico').textContent = '0';
        document.getElementById('diferencia').textContent = '0';
    }

    function cargarPiezas() {
        const proyectoCodigo = document.getElementById('proyecto').value;
        const bloqueId = parseInt(document.getElementById('bloque').value);
        const proyecto = proyectos.find(p => p.codigo === proyectoCodigo);
        const bloque = proyecto?.bloques.find(b => b.id === bloqueId);
        const piezaSelect = document.getElementById('pieza');

        piezaSelect.innerHTML = '<option value="">Seleccione una pieza</option>';

        if (bloque) {
            bloque.piezas.forEach(p => {
                const option = document.createElement('option');
                option.value = p.id;
                option.text = p.nombre;
                option.dataset.peso = p.peso_teorico;
                piezaSelect.appendChild(option);
            });
        }

        document.getElementById('pesoTeorico').textContent = '0';
        document.getElementById('diferencia').textContent = '0';
    }

    function mostrarPeso() {
        const pieza = document.getElementById('pieza');
        const pesoTeorico = parseFloat(pieza.selectedOptions[0]?.dataset.peso || 0);
        document.getElementById('pesoTeorico').textContent = pesoTeorico;

        document.getElementById('peso_real').value = '';
        document.getElementById('diferencia').textContent = '0';
    }

    document.getElementById('peso_real').addEventListener('input', () => {
        const pesoReal = parseFloat(document.getElementById('peso_real').value) || 0;
        const pesoTeorico = parseFloat(document.getElementById('pesoTeorico').textContent) || 0;
        const diferencia = pesoReal - pesoTeorico;
        document.getElementById('diferencia').textContent = diferencia.toFixed(2);
    });
</script>
@endsection