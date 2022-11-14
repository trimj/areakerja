<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Added
use Illuminate\Pagination\Paginator;

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
        Paginator::defaultView('templates.pagination.default');
        Paginator::defaultSimpleView('templates.pagination.simple');
    }
}
