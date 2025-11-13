<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Proyecto;
use App\Observers\ProyectoObserver;
use Illuminate\Support\Facades\URL;

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
        
        // Force HTTPS in production (Railway uses HTTPS)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
