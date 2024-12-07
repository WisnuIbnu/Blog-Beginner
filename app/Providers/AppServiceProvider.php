<?php

namespace App\Providers;

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\EnsureUserHasRole;

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
        //
    }
}
