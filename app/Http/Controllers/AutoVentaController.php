<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Marca;

class AutoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $marcas = Marca::all();

        
        $autos = Auto::with('modelo')
            ->when($request->marca_id, function ($query) use ($request) {
                return $query->whereHas('modelo.marca', function ($q) use ($request) {
                    $q->where('id', $request->marca_id);
                });
            })
            ->where('estado', '!=', 'Vendido')
            ->where('estado', '!=', 'No disponible')
            ->get();

        return view('autoventa.index', compact('autos', 'marcas'));
    }

  
}
