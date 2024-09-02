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
        
       if (Auth::check() && Auth::user()->id_rol == 1) {
            return $next($request);  
        }

        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta página.');

    }
}
