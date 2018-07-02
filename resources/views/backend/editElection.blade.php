@extends('backend.layouts.app')

@section('title', 'Edit Election | '. app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <strong>{{$election->getElectionPlace()->name}} {{$election->getElectionPlace()->getPlaceType()}} {{$election->getElectionType()->type }} election on {{$election->day.' - '.$election->month.' - '.$election->year }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <form action="{{route('admin.election.update', $election)}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>Edit Election Record</legend>

                            @include('backend.includes.partials.placesSelect')
                            @include('backend.includes.partials.electionTypeSelect')
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <select class="form-control" name="year">
                                            @for($y = date("Y"); $y <= date("Y")+4; $y++)
                                                <option value="{{$y}}">{{$y}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="month">Month</label>
                                        <select class="form-control" name="month">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <select class="form-control" name="day">
                                            @for($d = 1; $d <= 31; $d++)
                                                <option value="{{$d}}">{{$d}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Add a candidate to this election
                </div>
                <div class="card-block">
                    <form action="{{route('admin.add.aspirant', $election)}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <input type="hidden" name="election_id" value="{{$election->id}}">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" name="firstname" aria-describedby="emailHelp" type="text">

                            </div>

                            <div class="form-group">
                                <label for="middlename">Other Name</label>
                                <input class="form-control" name="middlename" aria-describedby="emailHelp" type="text">

                            </div>

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input class="form-control" name="surname" aria-describedby="emailHelp" type="text">

                            </div>

                            <div class="form-group">
                                <label for="party">Political Party</label>
                                <select class="form-control" name="party">
                                    <option>Abundant Nigeria Renewal Party (ANRP)</option>
                                    <option>Advanced Congress of Democrats (ACD)</option>
                                    <option>Alliance for Democracy (AD)</option>
                                    <option>Alliance for New Nigeria (ANN)[1]</option>
                                    <option>Action Democratic Party (ADP)</option>
                                    <option>All Democratic Peoples Movement (ADPM)</option>
                                    <option>All Progressives Congress (APC)</option>
                                    <option>African Democratic Congress (ADC)</option>
                                    <option>Advanced Peoples Democratic Alliance (APDA)[2]</option>
                                    <option>All Progressives Grand Alliance (APGA)</option>
                                    <option>All People's Party (APP)</option>
                                    <option>African Renaissance Party [ARP]</option>
                                    <option>Conscience People's Congress [CPC]</option>
                                    <option>Communist Party of Nigeria (CPN)</option>
                                    <option>Citizens Popular Party (CPP)</option>
                                    <option>Democratic Alternative (DA)</option>
                                    <option>Democratic Socialist Movement (DSM)</option>
                                    <option>Fresh Democratic Party (FDP)</option>
                                    <option>Justice Must Prevail Party (JMPP)</option>
                                    <option>Labour Party [LP]</option>
                                    <option>Masses Movement of Nigeria (MMN)</option>
                                    <option>National Conscience Party (NCP)</option>
                                    <option>National Interest Party (NIP)</option>
                                    <option>New Democrats (ND)</option>
                                    <option>New Generations Party of Nigeria (NGP)</option>
                                    <option>National Democratic Party (NDP)</option>
                                    <option>People's Democratic Party (PDP)[3]</option>
                                    <option>Progressive Peoples Alliance (PPA)</option>
                                    <option>People Progressive Party (PPP)</option>
                                    <option>People's Redemption Party (PRP)</option>
                                    <option>People's Salvation Party (PSP)</option>
                                    <option>(aa) ACTION ALLIANCE</option>
                                    <option>Social Democratic Mega Party (SDMP)</option>
                                    <option>Socialist Party of Nigeria (SPN)</option>
                                    <option>Social Democratic Party (SDP)</option>
                                    <option>United Nigeria People's Party (UNPP)</option>
                                    <option>United Progressive Party (UPP)[4]</option>
                                    <option>Mega People Political Party</option>
                                    <option>Young Progressive Party (YPP)</option>
                                    <option>kunlexso party (YPP)</option>
                                    <option>National Democratic Coalition (NADECO)</option>
                                    <option>Committee for National Consensus (CNC)</option>
                                    <option>Democratic Party of Nigeria (DPN)</option>
                                    <option>Grassroots Democratic Movement (GDM)</option>
                                    <option>National Centre Party of Nigeria (NCPN)</option>
                                    <option>United Nigeria Congress Party (UNCP)</option>
                                    <option>Justice Party (JP)</option>
                                    <option>National Republican Convention (NRC)</option>
                                    <option>Social Democratic Party (SDP)</option>
                                    <option>Greater Nigerian People's Party (GNPP)</option>
                                    <option>National Party of Nigeria (NPN)</option>
                                    <option>Nigeria Advance Party (NAP)</option>
                                    <option>Nigerian People's Party (NPP)</option>
                                    <option>People's Redemption Party (PRP)</option>
                                    <option>Unity Party of Nigeria (UPN)</option>
                                    <option>Movement of the People Party (MPP)</option>
                                    <option>Action Group (AG)</option>
                                    <option>Borno Youth Movement (BYM)</option>
                                    <option>Convention People's Party of Nigeria and the Cameroons</option>
                                    <option>Democratic Party of Nigeria and Cameroon (DPNC)</option>
                                    <option>Dynamic Party (DP)</option>
                                    <option>Igala Union (IU)</option>
                                    <option>Igbira Tribal Union (ITU)</option>
                                    <option>Kano People's Party (KPP)</option>
                                    <option>Lagos State United Front (LSUF)</option>
                                    <option>Mabolaje Grand Alliance (MGA)</option>
                                    <option>Midwest Democratic Front (MDF)</option>
                                    <option>National Independence Party (NIP)</option>
                                    <option>National Council of Nigeria and the Cameroons/National Council of Nigerian Citizens (NCNC)</option>
                                    <option>Niger Delta Congress (NDC)</option>
                                    <option>Nigerian National Democratic Party (NNDP)</option>
                                    <option>Northern Elements Progressive Union (NEPU)</option>
                                    <option>Northern People's Congress (NPC)</option>
                                    <option>Northern Progressive Front (NPF)</option>
                                    <option>Republican Party (RP)</option>
                                    <option>United Middle Belt Congress (UMBC)</option>
                                    <option>United National Independence Party (UNIP)</option>
                                    <option>Zamfara Commoners Party (ZCP)</option>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </fieldset>
                    </form>

                </div>
        </div>
    </div>

    </div><!--row-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Candidates in this election</strong>
                </div>
                <div class="card-block">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Party</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($aspirants as $aspirant)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$aspirant->firstname.' '.$aspirant->middlename.' '.$aspirant->surname}}</td>
                                <td>{{$aspirant->party}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
@endsection
