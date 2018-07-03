@extends('frontend.layouts.electionApp')

@section('title', app_name() . ' | '.__('navs.general.home'))

@push('after-styles')
    <style>
        .mainpanel {
            background: url({{asset('img/photo4.jpg')}}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
@endpush
@section('content')
    <div class="contentpanel result-form-bg">
        <div style="margin-bottom: 15em"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Election Results Retrieval</h4>
                <p>Enter parameters to search for a specific election.</p>
            </div>
            <div class="panel-body">
                <form class="form-inline" method="post" action="{{route('election.results.show')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="" for="">Location</label>
                        @include('backend.includes.partials.placesSelect')
                    </div>
                    <div class="form-group">
                        <label class="" for="">Election Category</label>
                        @include('backend.includes.partials.electionTypeSelect')
                    </div>
                    <div class="form-group">
                        <label class="" for="">Year</label>
                        @include('backend.includes.partials.yearSelect')
                    </div>
                    <div class="form-group">
                        <label class="" for="">Month</label>
                        @include('backend.includes.partials.monthSelect')
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div><!-- panel-body -->
        </div>

    </div><!-- contentpanel -->

@endsection

@push('after-scripts')

    <script src="{{asset('brackets/js/custom.js')}}"></script>

    @endpush