<?php

namespace App\Tanant\Scopes;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Scope;


class TanantScope implements Scope
{

    protected $tanant;

    /**
     * @param $tanant
     */
    public function __construct(Model $tanant)
    {
        $this->tanant = $tanant;
    }

    /**
     * apply
     * @param  Builder $builder
     * @param  Model   $model
     * @return void !! => as documented in laravel's Scope extented class.
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where($this->tanant->getForeignKey(), $this->tanant->id);
    }
}
