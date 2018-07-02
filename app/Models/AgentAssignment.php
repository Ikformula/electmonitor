<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentAssignment extends Model
{
    protected $fillable = ['polling_station_id', 'user_id'];
}
