<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'tu-ruta-post',
        // Puedes poner rutas que quieras excluir del CSRF
    ];
}
