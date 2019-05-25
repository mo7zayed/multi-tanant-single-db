<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tanant\Manager;
use App\Tanant\Observers\TanantObserver;

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
        $this->app->singleton(Manager::class, function () {
            return new Manager;
        });

        $this->app->singleton(TanantObserver::class, function () {
            return new TanantObserver(app(Manager::class)->getTanant());
        });
    }
}
