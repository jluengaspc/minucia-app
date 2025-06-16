<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h1 class="mb-4">Dashboard Principal</h1>

        <h3 class="mt-4">🔧 Módulos de Gestión (CRUD)</h3>
        <div class="list-group mb-4">
            <a href="{{ route('piezas.index') }}" class="list-group-item list-group-item-action">Gestión de Piezas</a>
            <a href="{{ route('bloques.index') }}" class="list-group-item list-group-item-action">Gestión de Bloques</a>
            <a href="{{ route('proyectos.index') }}" class="list-group-item list-group-item-action">Gestión de Proyectos</a>
            <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">Gestión de Usuarios</a>
        </div>

        <h3 class="mt-4">📋 Formularios</h3>
        <div class="list-group mb-4">
            <a href="{{ route('formulario') }}" class="list-group-item list-group-item-action">Registrar Nueva Pieza</a>
        </div>

        <h3 class="mt-4">📊 Reportes</h3>
        <div class="list-group mb-4">
            <a href="{{ route('reportes.pendientes') }}" class="list-group-item list-group-item-action">Piezas Pendientes por Proyecto</a>
            <a href="{{ route('reportes.grafico') }}" class="list-group-item list-group-item-action">Gráfico de Piezas Fabricadas vs Pendientes</a>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button class="btn btn-outline-danger">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>