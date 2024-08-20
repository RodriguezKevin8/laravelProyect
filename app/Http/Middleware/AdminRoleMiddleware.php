<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y si tiene el rol de administrador
        if (Auth::check() && Auth::user()->id_rol == 1) {
            return $next($request);  // Permitir el acceso
        }

        // Redirigir o mostrar un error si no tiene el rol de administrador
        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
