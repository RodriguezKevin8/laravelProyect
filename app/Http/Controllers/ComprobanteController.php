<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Mostrar el comprobante.
     */
    public function show(Request $request)
    {
        $datos = $request->session()->get('datos');

        if (!$datos) {
            return redirect()->route('dashboard')->with('error', 'No se encontraron datos del comprobante.');
        }
        return view('comprobante.show', compact('datos'));
    }
    
}
