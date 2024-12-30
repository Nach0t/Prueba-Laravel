<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')  // Permite acceso desde cualquier origen
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')  // Métodos permitidos
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');  // Cabeceras permitidas
    }
}
