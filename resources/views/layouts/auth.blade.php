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

    <title>Darasini</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body style="background:url(../img/education.jpg) center; background-size: cover; position: relative; background-repeat: no-repeat;background-attachment: fixed;">

    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-5 sidebar pull-right">
                    <section>
                        <div class="col-xs-12 text-center">
                            <img src="{{ asset('img/icon.png') }}" alt="Darasini logo" style="margin-bottom:30px; width:100px;">
                        </div>

                        @yield('content')

                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
