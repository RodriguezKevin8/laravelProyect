<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Modelo;

class MecanicoController extends Controller
{
    public function index()
    {
        
        $autos = Auto::with('modelo')->where('estado', 'Vendido')->get();

        return view('mecanico.index', compact('autos'));
    
    }
}
