<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Garantia;
use App\Models\TipoGarantia;

class GarantiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $auto = Auto::findOrFail($id);
        $tiposGarantia = TipoGarantia::all(); 

        return view('garantia.create', compact('auto', 'tiposGarantia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'id_auto' => 'required|exists:autos,id',
            'id_tipo_garantia' => 'required|exists:tipo_garantias,id', // Cambiado a tipo_garantias
        ]);

        Garantia::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'id_auto' => $request->id_auto,
            'id_tipo_garantia' => $request->id_tipo_garantia,
        ]);

      
        return redirect()->route('venta.create', $request->id_auto)->with('success', 'Garantía asignada correctamente. Proceda con la venta.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function renovar()
    {

    }

    /**
     * Renovar la garantía del vehículo.
     */
    



}
