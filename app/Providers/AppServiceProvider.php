<?php

namespace App\Providers;

use App\Models\Provider;
use App\Observers\ProviderObserver;
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

        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Provider::observe(ProviderObserver::class);

    }
}