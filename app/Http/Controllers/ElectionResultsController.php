<?php

namespace App\Http\Controllers;

use App\Http\Requests\Election\ElectionSubmitRequest;
use App\Http\Requests\Election\SearchElectionsRequest;
use App\Models\DemographicalStatistic;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Models\Photo;

class ElectionResultsController extends Controller
{

    public function resultForm(){
        return view('frontend.electionIndex');
    }

    public function electionsList(SearchElectionsRequest $request){
        $search_results = Election::where([
            ['place_id', $request->place_id],
            ['election_type_id', $request->election_type_id],
            ['year', $request->year],
            ['month', $request->month],
            ['data_submitted_on', '!=', NULL]
        ])->get();

        if($search_results->count() > 1){
            return view('frontend.electionList', ['elections' => $search_results]);
        }else if($search_results->count() == 1){
            return redirect()->route('single.results', $search_results[0]);
        }else{
            return redirect()->route('election.result')->withFlashDanger('No carried out election with matching records found in our Database');
        }
    }

    public function electionResults(Election $election){
        if($election->data_submitted_on != null) {
            $votes = Vote::where('election_id', $election->id)->get();
            $highest_votes = $votes->max('number_of_votes');
            $demographics = DemographicalStatistic::where('election_id', $election->id)->first();
            $photos = Photo::where('election_id', $election->id)->get();
            return view('frontend.electionResults', [
                'election' => $election,
                'votes' => $votes,
                'highest_votes' => $highest_votes,
                'demographics' => $demographics,
                'photos' => $photos
            ]);
        }else{
            return redirect()->route('fronted.index')->withFlashWarning('No voting data or statistics submitted yet for that election');
        }
    }

}
