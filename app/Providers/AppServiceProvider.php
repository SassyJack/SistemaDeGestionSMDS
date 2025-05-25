<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Proyecto;
use App\Observers\ProyectoObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Proyecto::observe(ProyectoObserver::class);
        
    }
}
