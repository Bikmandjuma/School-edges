<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // Force HTTPS in production
        // if (App::environment('production')) {
        //     URL::forceScheme('https');
        // }

        // Additional production-specific configurations
        // if (App::environment('production')) {
            // Configure any production-specific services, settings, etc.
            // Example: Configure a custom cache setting
        //     config(['cache.default' => 'redis']);
        // }
    }
}
