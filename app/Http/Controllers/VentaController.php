<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Metodo_pago;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Mostrar el formulario para crear una nueva venta.
     */
    public function create($id)
    {
        $auto = Auto::findOrFail($id);
        $clientes = Cliente::all();
        $metodosPago = Metodo_pago::all();

        return view('venta.create', compact('auto', 'clientes', 'metodosPago'));
    }

    /**
     * Guardar la venta en la base de datos.
     */
    public function store(Request $request)
{
    //dd($request->all());
    $request->validate([
        'fecha_venta' => 'required|date',
        'precio' => 'required|numeric',
        'id_metodo_pago' => 'required|exists:metodo_pagos,id',
        'id_auto' => 'required|exists:autos,id',
        'id_cliente' => 'required|exists:clientes,id',
        'id_usuario' => 'required|exists:users,id', // Valida que el ID de usuario exista en la tabla
    ]);

    // Crear una nueva venta
    Venta::create([
        'fecha_venta' => $request->fecha_venta,
        'precio' => $request->precio,
        'id_metodo_pago' => $request->id_metodo_pago,
        'id_auto' => $request->id_auto,
        'id_cliente' => $request->id_cliente,
        'id_usuario' => $request->id_usuario, // Aquí se utiliza el ID enviado desde el formulario
    ]);

    // Actualizar el estado del auto a "Vendido"
    $auto = Auto::findOrFail($request->id_auto);
    $auto->estado = 'Vendido';
    $auto->save();

    return redirect()->route('autos.index')->with('success', 'Venta procesada exitosamente.');
}

    


    // Otros métodos CRUD que tienes en tu controlador...
}
