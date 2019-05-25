<?php


namespace App\Tanant\Traits;

use App\Tanant\Scopes\TanantScope;
use App\Tanant\Observers\TanantObserver;
use App\Tanant\Manager;

trait ForTanants
{
    public static function boot()
    {
        parent::boot();

        $tanant = app(Manager::class)->getTanant();

        static::addGlobalScope(
            new TanantScope($tanant)
        );

        static::observe(app(TanantObserver::class));
    }
}
