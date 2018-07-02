<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable =[
        'file_name',
        'file_type',
        'user_id',
        'election_id',
        'polling_station_id',
        'description'
    ];
}
