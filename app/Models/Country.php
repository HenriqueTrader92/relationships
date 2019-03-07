<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    // Comunicação de UM para UM
    public function location()
    {
        return $this->hasOne(location::class);
    }
   
    // Comunicação de UM para Muitos
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
