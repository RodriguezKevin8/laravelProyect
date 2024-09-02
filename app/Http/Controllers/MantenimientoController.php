<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Mantenimiento;
use App\Models\Auto;
use App\Models\Metodo_Pago;
use App\Models\Repuesto;
use App\Models\Comprobante;
use PDF;

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

        $auto = Auto::findOrFail($request->id_auto);

       
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

      
        if ($request->has('repuestos')) {
            $mantenimiento->repuestos()->sync($request->input('repuestos'));
        }

        $comprobante = Comprobante::create([
            'total' => $request->total,
            'fecha_emision' => now(),
            'descripcion' => 'Comprobante de mantenimiento del auto modelo ' . $auto->modelo->nombre . ' marca ' . $auto->modelo->marca->marca . 'En motivo de: ' . $request->descripcion,
            'id_venta' => null,
            'id_mantenimiento' => $mantenimiento->id,
        ]);

        $totalMantenimiento = $request->mano_de_obra + $comprobante->total; 

        $datosComprobante = [
            'id' => $comprobante->id,
            'total' => $comprobante->total,
            'fecha_emision' => $comprobante->fecha_emision,
            'descripcion' => $comprobante->descripcion,
            'auto' => $auto->modelo->nombre,
            'marca' => $auto->modelo->marca->marca,
            'numero_serie' => $auto->numero_serie,
            'mano_de_obra' => $request->mano_de_obra,
            'total_mantenimiento' => $totalMantenimiento,
            'proximo_mantenimiento' => $request->proximo_mantenimiento
        ];

        return view('comprobante.downloadMantenimiento', compact('datosComprobante'));

        
    }

    public function descargarPdf(Request $request)
    {
        $datosComprobante = json_decode($request->input('datosComprobante'), true);
    
        $pdf = PDF::loadView('comprobante.comprobanteMantenimiento', compact('datosComprobante'));
        return $pdf->download('comprobante_mantenimiento.pdf');
    }

    public function mostrarMantenimientos($id)
    {
        
        $auto = Auto::findOrFail($id);
        $mantenimientos = Mantenimiento::where('id_auto', $id)->get();
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
