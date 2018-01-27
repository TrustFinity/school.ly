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

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Darasini') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        {{ config('app.name', 'Darasini') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        {{--@if (Auth::check() && Auth::user()->hasRole('Admin'))--}}
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/settings">Preferences</a></li>
                                    <li><a href="/levels">Levels</a></li>
                                    <li><a href="/subjects">Subjects</a></li>
                                    <li><a href="/class-groups">Class Groups</a></li>
                                    <li><a href="/streams">Class Streams</a></li>
                                    <li><a href="/support-staffs">Support Staffs</a></li>
                                    <li><a href="/chart-of-accounts">Chart of Accounts</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounting</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/transactions/salaries">Salaries</a></li>
                                    <li><a href="/transactions/expenses">Expenses</a></li>
                                    <li><a href="/transactions/school-fees">School Fees</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">DOS</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/settings">Results</a></li>
                                    <li><a href="/levels">Examinations</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="/dos" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Attendances</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/attendances">{{ getPreference()->attendants_type }}</a></li>
                                    <li><a href="/attendances/teachers">{{ getPreference()->instructors_type }}</a></li>
                                    <li><a href="/attendances/support-staffs">Support Staffs</a></li>
                                </ul>
                            </li>
                            <li><a href="/students">{{ getPreference()->attendants_type }}</a></li>
                            <li><a href="/teachers">{{ getPreference()->instructors_type }}</a></li>
                            <li class="dropdown">
                                <a href="/reports" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Income Statement</a></li>
                                    <li><a href="#">Balance Sheet</a></li>
                                    <li><a href="#">Trial Balance</a></li>
                                    <li><a href="#">Students Report</a></li>
                                    <li><a href="#">Teachers Report</a></li>
                                    <li><a href="#">School Fees Report</a></li>
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
                                    <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->username }}
                                </a>

                                <ul class="dropdown-menu" role="menu">
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

        <div class="container">
            @include('flash::message')
            @yield('content')

        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
