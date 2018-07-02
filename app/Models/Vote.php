<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function getCandidate(){
        return Aspirant::find($this->candidate_id);
    }
}
