<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
        public function create()
    {
        $proyectos = Proyecto::with('bloques.piezas')->get();
        return Inertia::render('Formulario', [ 'proyectos' => $proyectos ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pieza_id' => 'required|exists:piezas,id',
            'peso_real' => 'required|numeric'
        ]);

        $pieza = Pieza::findOrFail($request->pieza_id);
        $pieza->peso_real = $request->peso_real;
        $pieza->fecha_registro = now();
        $pieza->estado = 'Fabricado';
        $pieza->user_id = Auth::id();
        $pieza->save();

        return redirect()->back()->with('success', 'Registro guardado correctamente');
    }
}
