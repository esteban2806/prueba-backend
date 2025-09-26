<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
{
    $this->routes(function () {
        // Solo cargamos las rutas API
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Comentamos o eliminamos rutas web porque web.php ya no existe
        // Route::middleware('web')
        //     ->group(base_path('routes/web.php'));
    });
}

}
