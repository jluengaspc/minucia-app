@extends('layouts.app')

@section('content')
    <h2>Reporte gráfico de piezas pendientes y fabricadas por proyecto</h2>

    <canvas id="graficoProyectos" width="800" height="400"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoProyectos').getContext('2d');
        const datos = @json($datos);

        const proyectos = datos.map(d => d.proyecto);
        const pendientes = datos.map(d => d.pendientes);
        const fabricadas = datos.map(d => d.fabricadas);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: proyectos,
                datasets: [
                    {
                        label: 'Pendientes',
                        data: pendientes,
                        backgroundColor: 'orange'
                    },
                    {
                        label: 'Fabricadas',
                        data: fabricadas,
                        backgroundColor: 'green'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection