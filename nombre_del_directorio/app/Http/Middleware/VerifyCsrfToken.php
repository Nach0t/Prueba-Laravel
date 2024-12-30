<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Las rutas que se excluyen de la protección CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Rutas específicas que no requieren verificación CSRF
        'productos',     // Ruta para gestionar productos
        'api/*',         // Prefijo para todas las rutas de la API
    ];
}
