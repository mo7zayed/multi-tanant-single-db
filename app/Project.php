<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use \App\Tanant\Traits\ForTanants;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
