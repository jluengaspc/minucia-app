<?php

// app/Http/Controllers/BloqueController.php
namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class BloqueController extends Controller
{
    public function index()
    {
        $bloques = Bloque::with('proyecto')->paginate(10);
        return view('bloques.index', compact('bloques'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('bloques.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        Bloque::create($request->all());

        return redirect()->route('bloques.index')->with('success', 'Bloque creado exitosamente.');
    }

    public function edit(Bloque $bloque)
    {
        $proyectos = Proyecto::all();
        return view('bloques.edit', compact('bloque', 'proyectos'));
    }

    public function update(Request $request, Bloque $bloque)
    {
        $request->validate([
            'nombre' => 'required',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $bloque->update($request->all());

        return redirect()->route('bloques.index')->with('success', 'Bloque actualizado exitosamente.');
    }

    public function destroy(Bloque $bloque)
    {
        $bloque->delete();
        return redirect()->route('bloques.index')->with('success', 'Bloque eliminado.');
    }
}