<?php

// app/Http/Controllers/FormularioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Pieza;

class FormularioController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with(['bloques.piezas' => function ($query) {
            $query->where('estado', 'Pendiente');
        }])->get();

        return view('formulario', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pieza_id' => 'required|exists:piezas,id',
            'peso_real' => 'required|numeric|min:0',
        ]);

        $pieza = Pieza::find($request->pieza_id);
        $pieza->peso_real = $request->peso_real;
        $pieza->estado = 'Fabricado';
        $pieza->save();

        return redirect()->route('formulario')->with('success', 'Pieza registrada exitosamente.');
    }
}