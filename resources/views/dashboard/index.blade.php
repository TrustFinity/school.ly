@extends('layouts.app')

@section('content')
<<<<<<< 6756464bc2e464b722886d5d480ca067f638a33b
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>School Kanban</h3>
            <p>Kanban is a lean method to manage and improve work across human systems.</p>
        </div>
        <div class="panel-body">
=======
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        @if (Auth::check() && Auth::user()->hasRole('Student'))
            <div class="jumbotron">
                <div class="container">
                    <h1>Hello Dear Student</h1>
                    <p>Click button below to access your space</p>
                    <p>
                        <a href="/studentpage" class="btn btn-info btn-lg">Access my space</a>
                    </p>
                </div>
            </div>
        @endif

        @if (Auth::check() && Auth::user()->hasRole('Teacher'))
            <div class="jumbotron">
                <div class="container">
                    <h1>Hello Dear Teacher</h1>
                    <p>Click button below to access your space</p>
                    <p>
                        <a href="/teacherpage" class="btn btn-info btn-lg">Access my space</a>
                    </p>
                </div>
            </div>
        @endif

        @if (Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="jumbotron">
                <div class="container center">
                    <h2>Hello Dear Admin</h2>
                    <p class="lead">What do you want to do</p>
                    <p>
                        <p><a href="/students" class="btn btn-success btn-lg">View students</a></p>
                        <p><a href="/teachers" class="btn btn-success btn-lg">View Teachers</a></p>
                        <p><a href="/class-groups" class="btn btn-success btn-lg">View Class Groups</a></p>
                        <p><a href="/streams" class="btn btn-success btn-lg">View Class Streams</a></p>
                    </p>
                </div>
            </div>
        @endif

        @if (!Auth::check())
>>>>>>> setup wizard wip
            <div class="row">
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Financial board.</h2>
                            <p>school financial movement details</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Teachers board.</h2>
                            <p>General teaching planning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>School Dev..</h2>
                            <p>school planning and financing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="glyphicon glyphicon-plus"></i> Create new..</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Some nice school dashboard statistics here.
        </div>
        <div class="panel-body">
        </div>
    </div>
@endsection
