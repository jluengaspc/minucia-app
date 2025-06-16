<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pieza;
use App\Models\Proyecto;

class ReporteController extends Controller
{
    // A. Reporte de piezas pendientes agrupadas por proyecto
    public function piezasPendientes()
    {
        $pendientes = Pieza::where('estado', 'Pendiente')
            ->with('bloque.proyecto')
            ->get()
            ->groupBy(fn($pieza) => $pieza->bloque->proyecto->nombre ?? 'Sin proyecto');

        return view('reportes.pendientes', compact('pendientes'));
    }

    // B. Reporte gráfico por proyecto de pendientes y fabricadas
    public function graficoPiezas()
    {
        $proyectos = Proyecto::with('bloques.piezas')->get();

        $datos = $proyectos->map(function ($proyecto) {
            $piezas = $proyecto->bloques->flatMap->piezas;

            return [
                'proyecto' => $proyecto->nombre,
                'pendientes' => $piezas->where('estado', 'Pendiente')->count(),
                'fabricadas' => $piezas->where('estado', 'Fabricado')->count(),
            ];
        });

        return view('reportes.grafico', ['datos' => $datos]);
    }
}