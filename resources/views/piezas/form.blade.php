@php
    $isEdit = isset($pieza);
@endphp

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $pieza->nombre ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="peso_teorico" class="form-label">Peso Teórico</label>
    <input type="number" step="0.01" name="peso_teorico" class="form-control" value="{{ old('peso_teorico', $pieza->peso_teorico ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="peso_real" class="form-label">Peso Real</label>
    <input type="number" step="0.01" name="peso_real" class="form-control" value="{{ old('peso_real', $pieza->peso_real ?? '') }}">
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" class="form-select" required>
        <option value="Pendiente" {{ old('estado', $pieza->estado ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="Fabricado" {{ old('estado', $pieza->estado ?? '') == 'Fabricado' ? 'selected' : '' }}>Fabricado</option>
    </select>
</div>

<div class="mb-3">
    <label for="bloque_id" class="form-label">Bloque ID</label>
    <input type="number" name="bloque_id" class="form-control" value="{{ old('bloque_id', $pieza->bloque_id ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="form-label">Fecha de Registro</label>
    <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', isset($pieza) ? $pieza->fecha_registro->format('Y-m-d') : '') }}">
</div>