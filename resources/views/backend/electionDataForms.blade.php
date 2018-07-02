@extends('backend.layouts.app')

@section('title', ' Submit Election Data | '. app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{$election->getElectionPlace()->name}} {{$election->getElectionPlace()->getPlaceType()}} {{$election->getElectionType()->type }} election on {{$election->day.' - '.$election->month.' - '.$election->year }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    @if($election->data_submitted_on == null)
                    <form action="{{route('admin.election.data.store', $election)}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>Enter Election Records</legend>
                            <div class="row">
                                <div class="col-md-8">
                            <fieldset>
                                <legend><strong>Voting Results</strong></legend>
                                @if($aspirants->count())
                                @foreach($aspirants as $aspirant)
                                    <div class="form-group">
                                        <label for="aspirant_votes[]"><strong>{{$aspirant->firstname.' '.$aspirant->middlename.' '.$aspirant->surname}} of {{$aspirant->party}}</strong></label>
                                        <input type="number" required name="aspirant_votes[{{$aspirant->id}}]" min="0" class="form-control">
                                    </div>
                                @endforeach
                                    @else
                                <strong>No aspirants entered for this election yet</strong>
                                @endif
                            </fieldset>
                                </div>

                                <div class="col-md-4" style="border: solid 1px #C5C5C5; margin-bottom: 2em;">
                            <fieldset>
                                <legend><strong>Demographics</strong></legend>
                                    <div class="form-group">
                                        <label for="number_accredited">Number of those accredited</label>
                                        <input type="number" required name="number_accredited" min="0" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_who_voted">Number of voters</label>
                                        <input type="number" required name="number_who_voted" min="0" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_males">Number of Male Voters</label>
                                        <input type="number" required name="number_of_males" min="0" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_females">Number of Females</label>
                                        <input type="number" required name="number_of_females" min="0" class="form-control">
                                    </div>
                            </fieldset>
                                </div>
                            </div>

                        @if($aspirants->count())
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Proceed</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal modal-danger fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Please ensure that the data entered is accurate before proceeding.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" style="float: left" data-dismiss="modal">Review Data</button>
                                            <button type="submit" class="btn btn-success">Proceed</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endif
                        </fieldset>
                    </form>
                        @else
                        <h4>Voting data already submitted for this election. View results <a href="{{route('single.results', $election)}}">here</a></h4>
                    @endif

                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>You can submit photographs for each election at your assigned polling station here</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-4">
                    <form action="{{route('admin.election.store.image', $election)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <fieldset>

                                    <div class="form-group">
                                        <label for="photo"><strong>Upload an image</strong></label>
                                        <input type="file" required name="photo" accept="image/*" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="photo"><strong>Description (optional)</strong></label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>

                            </fieldset>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                                </div>

                                <div class="col-md-8">

                                    @if($photos->count())
                                        @include('backend.includes.partials.photosGallery')
                                    @endif


                                </div>
                            </div>

                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
