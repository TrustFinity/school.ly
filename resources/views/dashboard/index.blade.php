@extends('layouts.app')
@section('content-full-screen')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ school_name() }}</h3>
                    <p>
                        Hello{{ logged_in_lastname() }}, welcome to {{ config('app.name') }}
                        <span class="pull-right text-primary">
                            <strong>{{ todaysDate() }}</strong>
                        </span>
                    </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1>{{ $students->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                    <p>{{ getPreference()->attendants_type }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1>{{ $teachers->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                    <p>{{ getPreference()->instructors_type }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1>{{ $support_staff->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                    <p>Support Staff</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>General Information</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">{{ getPreference()->attendants_type }} by Gender</h4>
                        </div>
                        <div class="panel-body">
                            {!! $student_chart->html() !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">{{ getPreference()->instructors_type }} by Gender</h4>
                        </div>
                        <div class="panel-body">
                            {!! $teacher_chart->html() !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">Support Staff by Gender</h4>
                        </div>
                        <div class="panel-body">
                            {!! $support_staff_chart->html() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $growth_per_year->html() !!}
                </div>
            </div>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<h2>Performance</h2>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4 class="text-center">--}}
                        {{--By Gender--}}
                    {{--</h4>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--{!! $performance->html() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection
@section('scripts')
    {!! $student_chart->script() !!}
    {!! $teacher_chart->script() !!}
    {!! $support_staff_chart->script() !!}
    {!! $growth_per_year->script() !!}
    {{--{!! $performance->script() !!}--}}
@endsection
