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
        // Recuperar los datos del comprobante desde la sesión
        $datos = $request->session()->get('datos');

        // Si no hay datos en la sesión, redirigir a la página de error o a otra ruta
        if (!$datos) {
            return redirect()->route('dashboard')->with('error', 'No se encontraron datos del comprobante.');
        }

        // Retornar la vista del comprobante con los datos
        return view('comprobante.show', compact('datos'));
    }
}
