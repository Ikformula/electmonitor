<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'election_id',
        'party'
    ];

}
