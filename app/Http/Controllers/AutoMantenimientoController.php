<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Mantenimiento;


class AutoMantenimientoController extends Controller
{
    public function index()
    {
        
        $autos = Auto::with('modelo')->where('estado', 'Vendido')->get();

        return view('auto_mantenimientos.index', compact('autos'));
    
    }

    public function mostrarMantenimientos($id)
    {
        // Obtén el auto por su ID
        $auto = Auto::findOrFail($id);

        // Obtén los mantenimientos asociados a ese auto
        $mantenimientos = Mantenimiento::where('id_auto', $id)->get();

        // Devuelve la vista con los datos
        return view('auto_mantenimientos.mostrarMantenimientos', compact('auto', 'mantenimientos'));
    }


}
