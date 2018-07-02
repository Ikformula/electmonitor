<?php

namespace App\Http\Controllers\Backend\Election;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FieldAgentController extends Controller
{
    public function index(){

        if(is_null(Auth::user()->getPollingStation())){
            return view('backend.dashboard')->withFlashDanger('You need to be assigned a polling station first');
        }
        return view('backend.elections');
    }

}
