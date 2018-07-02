@extends('backend.layouts.app')

@section('title', 'Assign Pollong Station | '. app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <form action="{{route('admin.field_agent.assign.store')}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>Assign yourself to a Polling station</legend>
                            <small>Current Polling Station Assignment:<strong>
                                    @if(!is_null($logged_in_user->getPollingStation()))
                            {{$logged_in_user->getPollingStation()->unit_number}}
                            @else
                                None
                                @endif
                                </strong></small>
                            <div style="margin-bottom: 2em"></div>
                            @include('backend.includes.partials.pollingStationsSelect')

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
