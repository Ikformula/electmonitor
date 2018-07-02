<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlaceType;

class Place extends Model
{
    public function elections(){
        return $this->hasMany('App\Models\Election');
    }

    public function placeType(){
        return $this->belongsTo('App\Model\PlaceType');
    }

    public function getPlaceType(){
        $place_type = PlaceType::find($this->place_type_id);
        return $place_type->type;
    }
}
