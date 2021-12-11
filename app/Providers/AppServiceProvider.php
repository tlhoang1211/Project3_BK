<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Pagination\Paginator;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //        if ($this->app->environment('local'))
        //        {
        //            URL::forceScheme('https');
        //        }
        // Fix migrate bugs
        Builder::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
