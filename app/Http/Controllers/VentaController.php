<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Metodo_pago;
use App\Models\Comprobante;
use PDF;

class VentaController extends Controller
{
    // ...
    public function create($id)
    {
        $auto = Auto::findOrFail($id);
        $clientes = Cliente::all();
        $metodosPago = Metodo_pago::all();

        return view('venta.create', compact('auto', 'clientes', 'metodosPago'));
    }


    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'fecha_venta' => 'required|date',
            'precio' => 'required|numeric',
            'id_metodo_pago' => 'required|exists:metodo_pagos,id',
            'id_auto' => 'required|exists:autos,id',
            'id_cliente' => 'required|exists:clientes,id',
            'id_usuario' => 'required|exists:users,id',
        ]);

        // Crear una nueva venta
        $venta = Venta::create([
            'fecha_venta' => $request->fecha_venta,
            'precio' => $request->precio,
            'id_metodo_pago' => $request->id_metodo_pago,
            'id_auto' => $request->id_auto,
            'id_cliente' => $request->id_cliente,
            'id_usuario' => $request->id_usuario,
        ]);

        // Actualizar el estado del auto a "Vendido"
        $auto = Auto::findOrFail($request->id_auto);
        $auto->estado = 'Vendido';
        $auto->save();

        // Crear el comprobante
        $comprobante = Comprobante::create([
            'total' => $request->precio,
            'fecha_emision' => now(),
            'descripcion' => 'Comprobante de venta del auto modelo ' . $auto->modelo->nombre . ' marca ' . $auto->modelo->marca->marca . ' con número de serie ' . $auto->numero_serie,
            'id_venta' => $venta->id,
            'id_mantenimiento' => null,
        ]);

        $datosComprobante = [
            'id' => $comprobante->id,
            'total' => $comprobante->total,
            'fecha_emision' => $comprobante->fecha_emision,
            'descripcion' => $comprobante->descripcion,
            'auto' => $auto->modelo->nombre,
            'marca' => $auto->modelo->marca->marca,
            'numero_serie' => $auto->numero_serie,
        ];
    
        return view('comprobante.download', compact('datosComprobante'));
    }

    public function descargarPdf(Request $request)
    {
        $datosComprobante = json_decode($request->input('datosComprobante'), true);
    
        $pdf = PDF::loadView('comprobante.comprobante', compact('datosComprobante'));
        return $pdf->download('comprobante_venta.pdf');
    }

    // ...
}
