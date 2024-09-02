<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class MecanicoController extends Controller
{
    public function index(Request $request)
    {
       
        $numeroSerie = $request->input('numero_serie');
        $autos = Auto::with('modelo')
            ->when($numeroSerie, function ($query, $numeroSerie) {
                return $query->where('numero_serie', 'like', "%$numeroSerie%");
            })
            ->where('estado', 'Vendido')
            ->get();

        return view('mecanico.index', compact('autos'));
    }

    public function autoMantenimientos()
    {
        $autos = Auto::with('modelo')->where('estado', 'Vendido')->get();

        return view('mecanico.autoMantenimientos', compact('autos'));
    }
}
