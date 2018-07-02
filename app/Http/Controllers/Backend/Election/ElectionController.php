<?php

namespace App\Http\Controllers\Backend\Election;

use App\Http\Requests\Election\ElectionImageRequest;
use App\Http\Requests\Election\VotesAndStatsSubmitRequest;
use App\Models\Aspirant;
use App\Models\DemographicalStatistic;
use App\Models\Election;
use App\Http\Requests\Election\ElectionSubmitRequest;
use App\Models\ElectionType;
use App\Models\Photo;
use App\Models\Place;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        return view('backend.elections', ['elections' => $elections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->hasRole('executive')){
            $places = Place::all();
            $election_types = ElectionType::all();
            return view('backend.createElection', ['places' => $places, 'election_types' => $election_types]);
        }
        return back('302');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectionSubmitRequest $request)
    {
//        dd($request);
        Election::create($request->all());
//        return ('done');
        return redirect()->route('admin.election.index')->withFlashSuccess('Election Created');
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
    public function edit(Election $election)
    {
        $aspirants = Aspirant::where('election_id', $election->id)->get();
        return view('backend.editElection', ['election' => $election, 'aspirants' => $aspirants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElectionSubmitRequest $request, Election $election)
    {
        $election->update($request->only(['place_id', 'election_type_id', 'year', 'month', 'day']));
        return back()->withFlashSuccess('Election Details successfully updated');
    }


    /**
     * Form for voting results and election day demographics.
     *
     * @param  Model Election $election
     * @return \Illuminate\Http\Response
     */
    public function electionDataForms(Election $election){
            $aspirants = Aspirant::where('election_id', $election->id)->get();
            $photos = Photo::where('election_id', $election->id)->get();
            return view('backend.electionDataForms', [
                'election' => $election,
                'aspirants' => $aspirants,
                'photos' => $photos
            ]);
    }


    /**
     * Form for voting results and election day demographics.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function electionDataStore(VotesAndStatsSubmitRequest $request, Election $election){
        $aspirants = Aspirant::where('election_id', $election->id)->get();
        $logged_in_user_id = Auth::user()->id;
        foreach ($aspirants as $aspirant){
            $votes = new Vote();
            $votes->candidate_id = $aspirant->id;
            $votes->polling_station_id = Auth::user()->getPollingStation()->id;
            $votes->user_id = $logged_in_user_id;
            $votes->number_of_votes = $request->aspirant_votes[$aspirant->id];
            $votes->election_id = $election->id;
            $votes->save();
        }

        $demoStats = new DemographicalStatistic();
        $demoStats->polling_station_id = Auth::user()->getPollingStation()->id;
        $demoStats->user_id = $logged_in_user_id;
        $demoStats->number_of_males = $request->number_of_males;
        $demoStats->number_of_females = $request->number_of_females;
        $demoStats->number_accredited = $request->number_accredited;
        $demoStats->number_who_voted = $request->number_who_voted;
        $demoStats->election_id = $election->id;
        $demoStats->save();

        $election->data_submitted_by = $logged_in_user_id;
        $election->data_submitted_on = Carbon::now();
        $election->save();

        return redirect()->route('admin.election.index')->withFlashSuccess('Voting Data Successfully Added');
    }


    public function storeElectionImage(ElectionImageRequest $request, Election $election){
//        dd($request);
        $user = Auth::user();
        $file = $request->file('photo');
        $cov_filename = $election->getElectionPlace()->name.'-'.$election->getElectionPlace()->getPlaceType().'-'.$election->getElectionType()->type .'-'.$election->day.'-'.$election->month.'-'.$election->year.'_election_monitor-'.$user->getPollingStation()->unit_number.'_'. time() . '.' . $file->getClientOriginalExtension();
        $data = getimagesize($file);
        $width = $data[0];
        $height = $data[1];
        $file->move(public_path('election_day_images').'/', $cov_filename);
        $photo = new Photo();
        $photo->user_id = $user->id;
        $photo->election_id = $election->id;
        $photo->polling_station_id = $user->getPollingStation()->id;
        $photo->file_name = $cov_filename;
        $photo->width = $width;
        $photo->height = $height;
        if($request->has('description')){
            $photo->description = $request->description;
        }else{
            $photo->description = $cov_filename;
        }
        $photo->save();
        return back()->withFlashSuccess('Photo uploaded successfully');
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
