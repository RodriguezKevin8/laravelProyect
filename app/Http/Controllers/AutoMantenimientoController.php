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
        $auto = Auto::findOrFail($id);
        $mantenimientos = Mantenimiento::where('id_auto', $id)->get();
        return view('auto_mantenimientos.mostrarMantenimientos', compact('auto', 'mantenimientos'));
    }


}
