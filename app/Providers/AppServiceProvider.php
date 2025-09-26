<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\ClienteRepositoryInterface::class,
            \App\Repositories\EloquentClienteRepository::class
        );
    }


    public function boot(): void
    {
        //
    }
}
