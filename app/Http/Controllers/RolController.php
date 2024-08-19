<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols= Rol::all();
        return view('rols.index', compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rols.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validación del formulario
        $request->validate([
            'rol' => 'required|string|max:255',
        ]);

        // Crear un nuevo rol
        Rol::create([
            'rol' => $request->input('rol'),
        ]);

        // Redirigir a la lista de roles con un mensaje de éxito
        return redirect()->route('rols.index')->with('success', 'Rol creado correctamente.');
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
