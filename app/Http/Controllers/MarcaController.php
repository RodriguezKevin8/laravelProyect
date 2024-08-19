<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all(); 
        return view('marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            // Validar los datos del formulario
        $request->validate([
            'marca' => 'required|string|max:255',
        ]);

        // Crear una nueva marca
        Marca::create([
            'marca' => $request->marca,
        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = Marca::findOrFail($id);
        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'marca' => 'required|string|max:255',
        ]);

        // Encontrar la marca y actualizarla
        $marca = Marca::findOrFail($id);
        $marca->update([
            'marca' => $request->marca,
        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();
    
        return redirect()->route('marcas.index')->with('success', 'Marca eliminada exitosamente');
    }
}
