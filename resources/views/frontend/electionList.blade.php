@extends('frontend.layouts.electionApp')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')
    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Election Results Retrieval</h4>
                <p>We found the following records matching your search. Select any to view the results</p>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Geopolitical Distribution</th>
                        <th>Election Class</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($elections as $election)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{ $election->getElectionPlace()->name }}</td>
                            <td>{{ $election->getElectionType()->type }}</td>
                            <td>{{ $election->year.' - '.$election->month.' - '.$election->day }}</td>

                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View results"></i></a>

                                </div></td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- panel-body -->
        </div>

    </div><!-- contentpanel -->

@endsection

@push('after-scripts')

    <script src="{{asset('brackets/js/custom.js')}}"></script>

    @endpush