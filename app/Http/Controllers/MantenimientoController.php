<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Mantenimiento;
use App\Models\Auto;
use App\Models\Metodo_Pago;
use App\Models\Repuesto;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $mantenimientos = Mantenimiento::all();
        return view('mantenimiento.index', compact('auto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id) 
    {
        $metodoPagos = Metodo_Pago::all();
        $repuestos = Repuesto::all();
        $auto = Auto::find($id); 

        if (!$auto) {
            return redirect()->back()->withErrors(['msg' => 'Auto no encontrado.']);
        }

        // Pasa el auto a la vista
        return view('mantenimiento.create', compact('auto', 'metodoPagos', 'repuestos'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'descripcion' => 'nullable|string',
            'id_auto' => 'required|exists:autos,id',
            'total' => 'nullable|numeric',
            'proximo_mantenimiento' => 'nullable|date',
            'id_usuario' => 'required|exists:users,id',
            'id_metodo_pago' => 'nullable|exists:metodo_pagos,id',
            'mano_de_obra' => 'nullable|numeric',
            'repuestos' => 'nullable|array',
            'repuestos.*' => 'exists:repuestos,id_repuesto'
        ]);

        // Crear un nuevo registro en la tabla mantenimientos
        $mantenimiento = Mantenimiento::create([
            'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            'descripcion' => $request->input('descripcion'),
            'id_auto' => $request->input('id_auto'),
            'total' => $request->input('total'),
            'proximo_mantenimiento' => $request->input('proximo_mantenimiento'),
            'id_usuario' => $request->input('id_usuario'),
            'id_metodo_pago' => $request->input('id_metodo_pago'),
            'mano_de_obra' => $request->input('mano_de_obra'),
        ]);

        // Asociar repuestos si hay alguno
        if ($request->has('repuestos')) {
            $mantenimiento->repuestos()->sync($request->input('repuestos'));
        }

        return redirect()->route('mecanicos.index')->with('success', 'Mantenimiento creado con éxito.');
        //
    }

    public function mostrarMantenimientos($id)
    {
        // Obtén el auto por su ID
        $auto = Auto::findOrFail($id);
        
        // Obtén los mantenimientos asociados a ese auto
        $mantenimientos = Mantenimiento::where('id_auto', $id)->get();

        // Devuelve la vista con los datos
        return view('mantenimientos.index', compact('auto', 'mantenimientos'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
