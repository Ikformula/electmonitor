<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('brackets/images/favicon.png')}}" type="image/png">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Iyke 08184496562')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <link href="{{asset('brackets/css/style.default.css')}}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="{{asset('brackets/js/html5shiv.js')}}"></script>
        <script src="{{asset('brackets/js/respond.min.js')}}"></script>


        <![endif]-->
        @stack('after-styles')
    </head>
    <body class="horizontal-menu">
    <section>

        <div class="leftpanel">

            <div class="logopanel">
                <h1><span>[</span> bracket <span>]</span></h1>
            </div><!-- logopanel -->

            <div class="leftpanelinner">

                <!-- This is only visible to small devices -->
                {{--<div class="visible-xs hidden-sm hidden-md hidden-lg">--}}
                    {{--<div class="media userlogged">--}}
                        {{--<img alt="" src="{{asset('brackets/images/photos/loggeduser.png')}}" class="media-object">--}}
                        {{--<div class="media-body">--}}
                            {{--<h4>John Doe</h4>--}}
                            {{--<span>"Life is so..."</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<h5 class="sidebartitle actitle">Account</h5>--}}
                    {{--<ul class="nav nav-pills nav-stacked nav-bracket mb30">--}}
                        {{--<li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-question-circle"></i> <span>Help</span></a></li>--}}
                        {{--<li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}

                <h5 class="sidebartitle">Navigation</h5>

            </div><!-- leftpanelinner -->
        </div><!-- leftpanel -->

        <div class="mainpanel">

        @include('includes.partials.logged-in-as')
            @include('frontend.includes.navBar')

            <div class="contentpanel">
                <div class="row">
                    <div class="col-md-6">
                        @include('includes.partials.messages')
                    </div>
                </div>
                @yield('content')
            </div>

        </div><!-- mainpanel -->


    </section>

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/frontend.js')) !!}


    <script src="{{asset('brackets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('brackets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('brackets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('brackets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('brackets/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('brackets/js/toggles.min.js')}}"></script>
    <script src="{{asset('brackets/js/retina.min.js')}}"></script>
    <script src="{{asset('brackets/js/jquery.cookies.js')}}"></script>


    @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
