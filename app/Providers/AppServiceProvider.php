<?php

namespace App\Providers;

use App\Auth\TentorUserProvider;
use App\Models\Tentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        Auth::provider('tentor-eloquent', function ($app, array $config) {
            return new TentorUserProvider($app['hash'], $config['model']);
        });
    }
}
