<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;
use App\Models\Proveedore;  // Asumiendo que `Proveedore` es el modelo relacionado

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repuestos = Repuesto::all();  // Obtener todos los repuestos
        return view('repuesto.index', compact('repuestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedore::all();  // Obtener todos los proveedores
        return view('repuesto.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_proveedor' => 'required|exists:proveedores,id',  // Validar que el proveedor exista
        ]);

        // Crear un nuevo repuesto
        Repuesto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_proveedor' => $request->id_proveedor,
        ]);

        // Redirigir al índice de repuestos con un mensaje de éxito
        return redirect()->route('repuestos.index')->with('success', 'Repuesto creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $repuesto = Repuesto::findOrFail($id);  // Encontrar el repuesto por su ID
        $proveedores = Proveedore::all();  // Obtener todos los proveedores

        return view('repuesto.edit', compact('repuesto', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_proveedor' => 'required|exists:proveedores,id',  // Validar que el proveedor exista
        ]);

        // Actualizar el repuesto existente
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_proveedor' => $request->id_proveedor,
        ]);

        return redirect()->route('repuestos.index')->with('success', 'Repuesto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $repuesto = Repuesto::findOrFail($id);  
        $repuesto->delete();  

        return redirect()->route('repuestos.index')->with('success', 'Repuesto eliminado correctamente.');
    }
}
