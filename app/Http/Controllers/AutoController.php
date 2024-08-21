<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Modelo;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autos = Auto::with('modelo')->get();
        return view('auto.index', compact('autos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelo::all();
        return view('auto.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detalles' => 'nullable|string',
            'numero_serie' => 'required|string|max:255',
            'estado' => 'nullable|string',
            'id_modelo' => 'required|exists:modelos,id',
        ]);

        Auto::create($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auto = Auto::findOrFail($id);
        $modelos = Modelo::all();
        return view('auto.edit', compact('auto', 'modelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'detalles' => 'nullable|string',
            'numero_serie' => 'required|string|max:255',
            'estado' => 'nullable|string',
            'id_modelo' => 'required|exists:modelos,id',
        ]);

        $auto = Auto::findOrFail($id);
        $auto->update($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Auto eliminado exitosamente.');
    }
}
