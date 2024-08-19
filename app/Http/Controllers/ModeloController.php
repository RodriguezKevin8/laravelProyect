<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = Modelo::all(); 
        return view('modelo.index', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();  
        return view('modelo.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_marca' => 'required|exists:marcas,id',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),  // Validar que el año sea válido
        ]);

        // Crear un nuevo modelo
        $modelo = new Modelo();
        $modelo->nombre = $request->nombre;
        $modelo->id_marca = $request->id_marca;  // Guardar la marca seleccionada
        $modelo->anio = $request->anio;  // Guardar el año ingresado
        $modelo->save();

        // Redirigir al índice de modelos con un mensaje de éxito
        return redirect()->route('modelos.index')->with('success', 'Modelo creado correctamente.');
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
        $modelo = Modelo::findOrFail($id); 
         $marcas = Marca::all();  

    return view('modelo.edit', compact('modelo', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_marca' => 'required|exists:marcas,id',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),  
        ]);
    
        $modelo = Modelo::findOrFail($id); 
        $modelo->nombre = $request->nombre;
        $modelo->id_marca = $request->id_marca;
        $modelo->anio = $request->anio;
        $modelo->save();
    
        return redirect()->route('modelos.index')->with('success', 'Modelo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modelo = Modelo::findOrFail($id);  
        $modelo->delete();  
    
        return redirect()->route('modelos.index')->with('success', 'Modelo eliminado correctamente.');
    }
}
