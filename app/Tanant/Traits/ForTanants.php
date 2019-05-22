<?php


namespace App\Tanant\Traits;

use App\Tanant\Scopes\TanantScope;
use App\Tanant\Manager;

trait ForTanants
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(
            new TanantScope(app(Manager::class)->getTanant())
        );
    }
}
