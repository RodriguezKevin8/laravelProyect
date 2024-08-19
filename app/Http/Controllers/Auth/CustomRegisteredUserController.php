<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomRegisteredUserController extends Controller
{
    public function create()
    {
        
        if (Auth::check() && Auth::user()->id_rol == 1) {
            return view('auth.register');
        }

        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta página.');
    }

    public function store(Request $request)
    {
       
        if (!Auth::check() || Auth::user()->id_rol != 1) {
            return redirect('/dashboard')->with('error', 'No tienes permiso para realizar esta acción.');
        }

       
        $this->validator($request->all())->validate();

      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol' => $request->id_rol,
        ]);

        event(new Registered($user));

       
        return redirect()->route('register')->with('success', 'Usuario creado correctamente.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_rol' => ['required'],  
        ]);
    }
}
