<?php

namespace App\Http\Controllers\Backend\Election;

use App\Http\Requests\Election\AddAspirantRequest;
use App\Models\Aspirant;
use App\Http\Controllers\Controller;

class AspirantController extends Controller
{
    public function addCandidate(AddAspirantRequest $request, $election){
        Aspirant::create($request->all());

        return redirect()->back()->withFlashSuccess('Candidate Added Successfully');
    }
}
