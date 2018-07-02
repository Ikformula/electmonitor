@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Welcome {{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <p>This is the dashboard access to the <a href="{{route('frontend.index')}}">Election Monitoring and Result Checking System</a>.</p>

                    <p>There are three roles with different abilities on this platform.</p>

                    <ol>
                        <li><strong>The Administrator:</strong>&nbsp;has overall authority over the platform, can alter user records.</li>
                        <li><strong>The Executive:</strong>&nbsp;they create elections, specify candidates and their parties for each election, assign field agents to polling stations.</li>
                        <li><strong>Field agents:&nbsp;</strong>they monitor elections at the polling stations and enter required data for each polling station they monitor in every election&nbsp;exercise.</li>
                    </ol>

                    <p>The role of a user determines where or what they can access and what options they see on their sidebar.</p>

                    @role('administrator')
                    <p>You can manage users, view system logs by clicking on the relevant link on the sidebar.</p>
                    @endrole

                    @role('executive')
                    <p>You can create an election, modify existing elections from the elections list.&nbsp;</p>
                    <p>Assign agents by clicking on the users link and editing any user record. You have to make a user a field agent before you can assign them to a polling station.</p>
                    @endrole

                    @role('field_agent')
                    <p>You can click on the elections list and select any to add accurate data.</p>
                    @endrole

                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
