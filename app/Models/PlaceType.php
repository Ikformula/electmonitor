<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    public function places(){
        return $this->hasMany('App\Models\Place');
    }
}
