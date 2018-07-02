@extends ('backend.layouts.app')

@section ('title', 'Field Agents | '. app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Field Agents
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="{{ route('admin.election.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Add New Election"><i class="fas fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
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
                                        <a href="#" class="btn btn-info"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a>
                                        <a href="{{route('admin.election.edit', $election)}}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>

                                        <div class="btn-group" role="group">
                                            <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                More
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="userActions">
                                                <a href="{{route('admin.election.destroy', $election)}}"
                                                   data-method="delete"
                                                   data-trans-button-cancel="Cancel"
                                                   data-trans-button-confirm="Delete"
                                                   data-trans-title="Are you sure you want to do this?"
                                                   class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
{{--                    {!! $elections->count() !!}--}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
{{--                    {!! $users->render() !!}--}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
