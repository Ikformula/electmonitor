<?php

namespace App\Models;

use App\Models\ElectionType;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['place_id', 'election_type_id', 'year', 'month', 'day'];

    public function electionType(){
        return $this->belongsTo('App\Models\ElectionType');
    }

    public function place(){
        return $this->belongsTo('App\Models\Place');
    }


    public function getElectionType(){
        return ElectionType::find($this->election_type_id);
    }

    public function getElectionPlace(){
        return Place::find($this->place_id);
    }
}
