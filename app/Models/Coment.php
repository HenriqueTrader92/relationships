<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }
}