<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="description" content="School Management System, Uganda School Syllabus">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Trustfinity Technologies">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Darasini') }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    {!! Charts::styles() !!}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand title" href="{{ url('/dashboard') }}">
                        {{ config('app.name', 'Darasini') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="blue dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/settings">Preferences</a></li>
                                    <li><a href="/roles">Roles</a></li>
                                    <li><a href="/users">Users</a></li>
                                    <li><a href="/levels">School Levels</a></li>
                                    <li><a href="/subjects">Subjects</a></li>
                                    <li><a href="/class-groups">Class Groups</a></li>
                                    <li><a href="/streams">Class Streams</a></li>
                                    <li><a href="/support-staff">Support Staff</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown" role="button"
                                   aria-expanded="false">Accounting</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/transactions/salaries">Salaries</a></li>
                                    <li><a href="/transactions/expenses">Expenses</a></li>
                                    <li><a href="/transactions/school-fees">School Fees</a></li>
                                    <li><a href="/chart-of-accounts">Chart of Accounts</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">DOS</a>
                                <ul class="dropdown-menu" role="menu">
                                    {{-- <li><a href="/settings">Results</a></li> --}}
                                    <li><a href="/examinations">Examinations</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="/dos"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-expanded="false">Attendance</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/attendances">{{ getPreference()->attendants_type }}</a></li>
                                    {{-- <li><a href="/attendances/teachers">{{ getPreference()->instructors_type }}</a></li> --}}
                                    {{-- <li><a href="/attendances/support-staffs">Support Staff</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="/students">{{ getPreference()->attendants_type }}</a></li>
                            <li><a href="/teachers">{{ getPreference()->instructors_type }}</a></li>
                            <li class="dropdown">
                                <a href="/reports"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-expanded="false">Reports</a>
                                <ul class="dropdown-menu" role="menu">
                                    {{--<li><a href="#">Trial Balance</a></li>--}}
                                    {{--<li><a href="#">Balance Sheet</a></li>--}}
                                    {{--<li><a href="#">Income Statement</a></li>--}}
                                    {{--<li><a href="#">School Fees Report</a></li>--}}
                                    <li><a href="/reports/students">{{ getPreference()->attendants_type }} Report</a></li>
                                    <li><a href="/reports/teachers">{{ getPreference()->instructors_type }} Report</a></li>
                                    <li><a href="/reports/support-staff">Support Staff Report</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle"></i> {{ Auth::user()->last_name }}
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/users/{{Auth::user()->id}}/edit">Update Information</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" id="app">
            @include('flash::message')
            @if(isset($errors) and count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {!! $error !!}
                    </div>
                @endforeach
            @endif

            @yield('content')
        </div>
        <div id="app" class="container">
            {{-- <div class="col-md-10 col-md-offset-1"> --}}
                @include('flash::message')
                @yield('content-full-screen')
            {{-- </div> --}}
        </div>
        
    </div>
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    {!! Charts::scripts() !!}
    @yield('scripts')
</body>
</html>
