<?php

namespace App\Tanant\Observers;

use Illuminate\Database\Eloquent\Model;

class TanantObserver
{
    function __construct(Model $tanant)
    {
        $this->tanant = $tanant;
    }

    /**
     * creating
     * @param  Model  $model
     * @return void
     */
    public function creating(Model $model) : void
    {
        $foreignKey = $this->tanant->getForeignKey();

        if (!isset($model->{$foreignKey})) {
            $model->setAttribute($foreignKey, $this->tanant->id);
        }
    }
}
