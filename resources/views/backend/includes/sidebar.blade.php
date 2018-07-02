<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                                {{ __('menus.backend.log-viewer.dashboard') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                                {{ __('menus.backend.log-viewer.logs') }}
                            </a>
                        </li>
                    </ul>
                </li>

            @endif



            {{--Elections --}}
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/election*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-list"></i> Election Data
                </a>

                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/election/')) }}" href="{{ route('admin.election.index') }}">
                            All Elections List
                        </a>
                    </li>

                    @hasanyrole('administrator|executive')
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/election/create')) }}" href="{{ route('admin.election.create') }}">
                            Create New Election
                        </a>
                    </li>
                    @endrole

                </ul>
            </li>

            {{--Elections end--}}



            {{--@role('field_agent')--}}
            {{--Field agent --}}
            {{--<li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/field_agent*'), 'open') }}">--}}
                {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
                    {{--<i class="fa fa-list"></i> Field Agent Tasks--}}
                {{--</a>--}}

                {{--<ul class="nav-dropdown-items">--}}


                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/field_agent/index*')) }}" href="{{ route('admin.field_agent.index') }}">--}}
                            {{--<i class="fa fa-file"></i> Submit Voting Data--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/field_agent/demography*')) }}" href="{{ route('admin.field_agent.demography') }}">--}}
                            {{--<i class="fa fa-chart-pie"></i> Submit Demographics--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--Field agent end--}}

            {{--@endrole--}}

            {{--Links --}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/places/index*')) }}" href="{{ route('admin.places.index') }}">
                   <i class="fa fa-location-arrow"></i> List Locations
                </a>
            </li>
            {{--links end--}}
        </ul>
    </nav>
</div><!--sidebar-->