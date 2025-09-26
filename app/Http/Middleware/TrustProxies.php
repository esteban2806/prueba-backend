<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    // Puedes dejarlo en null o '*' para todos los proxies
    protected $proxies = '*';

    // Configura cabeceras según Laravel 9/10
    protected $headers = Request::HEADER_X_FORWARDED_FOR;
}
