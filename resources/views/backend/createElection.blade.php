@extends('backend.layouts.app')

@section('title', 'Create Election | '. app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <form action="{{route('admin.election.store')}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>New Election Record</legend>

                            <div class="form-group">
                                <label for="place_id">Geopolitical Location</label>
                                {{--<select class="form-control" name="place_id">--}}
                                    {{--<option value="1" selected="selected">Nigeria</option>--}}
                                    {{--@foreach($places as $place)--}}
                                        {{--<option value="{{$place->id}}">{{$place->name}}</option>--}}
                                    {{--@endforeach--}}

                                {{--</select>--}}
                                @include('backend.includes.partials.placesSelect')
                            </div>
                            <div class="form-group">
                                <label for="election_type_id">Election type</label>
                                @include('backend.includes.partials.electionTypeSelect')
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        @include('backend.includes.partials.yearSelect')
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="month">Month</label>
                                        @include('backend.includes.partials.monthSelect')
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        @include('backend.includes.partials.daySelect')
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
