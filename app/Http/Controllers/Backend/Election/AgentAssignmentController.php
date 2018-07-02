<?php

namespace App\Http\Controllers\Backend\Election;

use App\Http\Requests\Election\SubmitStationAssignmentRequest;
use App\Models\AgentAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentAssignmentController extends Controller
{
    public function create()
    {
        return view('backend.assignToPollingStation');
    }

    public function store(SubmitStationAssignmentRequest $request, $user){
        $assignment = AgentAssignment::firstOrCreate(['user_id' => $user->id]);
//        $assignment = new AgentAssignment();
        $assignment->polling_station_id = $request->polling_station_id;
//        $assignment->user_id = Auth::user()->id;
        $assignment->save();
        return redirect()->back()->withFlashSuccess('Polling Station Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
