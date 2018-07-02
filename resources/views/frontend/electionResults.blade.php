@extends('frontend.layouts.electionApp')

@section('title', app_name() . ' | '.__('navs.general.home'))

@push('after-styles')
    <link href="{{asset('brackets/css/jquery.datatables.css')}}" rel="stylesheet">
    @endpush

@section('content')
    <div class="contentpanel">

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-dark panel-alt">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="minimize">&minus;</a>
                        </div><!-- panel-btns -->
                        <h4 class="panel-title"><strong>{{$election->getElectionPlace()->name}} {{$election->getElectionPlace()->getPlaceType()}} {{$election->getElectionType()->type }} election on {{$election->day.' - '.$election->month.' - '.$election->year }}</strong></h4>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12 mb30">
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table" id="election-results-table">
                                            <thead>
                                            <tr class="table-head-alt">
                                                <th class="col-md-3">Candidate</th>
                                                <th class="col-md-3">Party</th>
                                                <th class="col-md-5"><i class="fa fa-bars"></i></th>
                                                <th class="col-md-1">Votes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($votes as $vote)

                                                <tr>
                                                    <td>{{$vote->getCandidate()->firstname.' '.$vote->getCandidate()->surname}}</td>
                                                    <td>{{$vote->getCandidate()->party}}</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div style="width: {{getPercentage($vote->number_of_votes, $highest_votes) }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{getPercentage($vote->number_of_votes, $highest_votes)}}" role="progressbar" @if($vote->number_of_votes == $highest_votes) class="progress-bar progress-bar-primary progress-bar-striped" @else class="progress-bar progress-bar-primary" @endif>
                                                                <span class="sr-only">{{$vote->number_of_votes}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$vote->number_of_votes}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div><!-- table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="minimize">&minus;</a>
                        </div><!-- panel-btns -->
                        <h4 class="panel-title">Other Statistics about this election </h4>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Total Number of Voters</td>
                                            <td>{{$demographics->number_who_voted}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number Accredited</td>
                                            <td>{{$demographics->number_accredited}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Males <i class="fa fa-male"></i></td>
                                            <td>{{$demographics->number_of_males}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Females <i class="fa fa-female"></i></td>
                                            <td>{{$demographics->number_of_females}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                    </div>
                </div>
            </div>
        </div>

        @if($photos->count())
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-dark panel-alt">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="minimize">&minus;</a>
                        </div><!-- panel-btns -->
                        <h4 class="panel-title"><strong>Photos taken around polling stations for this election</strong> - Results </h4>
                    </div>
                    <div class="panel-body">

                            @include('backend.includes.partials.photosGallery')

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div><!-- contentpanel -->

@endsection

@push('after-scripts')

    <script src="{{asset('brackets/js/custom.js')}}"></script>
    {{--<script src="{{asset('brackets/js/charts.js')}}"></script>--}}
    <script src="{{asset('brackets/js/jquery.datatables.min.js')}}"></script>

   <script>
        jQuery(document).ready(function() {

            jQuery('#election-results-table').dataTable({
                "order": [[ 2, "desc" ]]
            });
        });
    </script>
@endpush