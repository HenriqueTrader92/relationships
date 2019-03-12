<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //Retornar todas cidades de uma determinada empresa
    public function cities()
    {
        return $this->belongsToMany(City::class, 'company_city');
    }
}
