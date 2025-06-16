<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PiezaController extends Controller
{
    public function index()
    {
        $piezas = Pieza::all();
        return view('piezas.index', compact('piezas'));
    }

    public function create()
    {
        return view('piezas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'peso_teorico' => 'required|numeric',
            'peso_real' => 'nullable|numeric',
            'estado' => 'required|in:Pendiente,Fabricado',
            'bloque_id' => 'required|integer',
            'fecha_registro' => 'nullable|date',
        ]);

        Pieza::create([
            'nombre' => $request->nombre,
            'peso_teorico' => $request->peso_teorico,
            'peso_real' => $request->peso_real,
            'estado' => $request->estado,
            'bloque_id' => $request->bloque_id,
            'fecha_registro' => $request->fecha_registro,
            'user_id' => Auth::id(), // usuario autenticado
        ]);

        return redirect()->route('piezas.index')->with('success', 'Pieza registrada correctamente.');
    }

    public function edit(Pieza $pieza)
    {
        return view('piezas.edit', compact('pieza'));
    }

    public function update(Request $request, Pieza $pieza)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'peso_teorico' => 'required|numeric',
            'peso_real' => 'nullable|numeric',
            'estado' => 'required|in:Pendiente,Fabricado',
            'bloque_id' => 'required|integer',
            'fecha_registro' => 'nullable|date',
        ]);

        $pieza->update([
            'nombre' => $request->nombre,
            'peso_teorico' => $request->peso_teorico,
            'peso_real' => $request->peso_real,
            'estado' => $request->estado,
            'bloque_id' => $request->bloque_id,
            'fecha_registro' => $request->fecha_registro,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('piezas.index')->with('success', 'Pieza actualizada correctamente.');
    }

    public function destroy(Pieza $pieza)
    {
        $pieza->delete();
        return redirect()->route('piezas.index')->with('success', 'Pieza eliminada correctamente.');
    }
}