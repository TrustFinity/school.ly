@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>General Information</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Hello <strong>{{ logged_in_lastname() }}</strong>, welcome to {{ config('app.name') }}
                        <span class="pull-right text-primary">
                            <strong>{{ todaysDate() }}</strong>
                        </span>
                    </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h1>200</h1>
                                            <span class="small">boys</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <h1>185</h1>
                                            <span class="small">girls</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <p>Attendance Today</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <h1>{{ $students->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                        <br>
                                </div>
                                <div class="panel-footer">
                                    <p><a href="/students">{{ getPreference()->attendants_type }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="panel panel-danger">
                                <div class="panel-body">
                                    <h1>{{ $teachers->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                        <br>
                                </div>
                                <div class="panel-footer">
                                    <p><a href="/teachers">{{ getPreference()->instructors_type }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <h1>{{ $support_staff->count() }}
                                        <span class="pull-right"><i class="glyphicon glyphicon-user"></i></span></h1>
                                        <br>
                                    
                                </div>
                                <div class="panel-footer">
                                    <p><a href="/support-staff">Support Staff</a></p>
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
            <h5>Gender Statistics</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">{{ getPreference()->attendants_type }}</h4>
                        </div>
                        <div class="panel-body">
                            {!! $student_chart->html() !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">{{ getPreference()->instructors_type }}</h4>
                        </div>
                        <div class="panel-body">
                            {!! $teacher_chart->html() !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-center">Support Staff</h4>
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
            <h5>New commers per year</h5>
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

    <div class="row">
        <div class="col-md-12">
            <h2>Academic Information</h2>
        </div>
    </div>

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
