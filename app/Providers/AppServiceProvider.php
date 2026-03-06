<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Force HTTPS si l'environnement est production
        if(env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
