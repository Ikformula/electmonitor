<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionType extends Model
{
    public function elections(){
        return $this->hasMany('App\Models\Election');
    }
}
