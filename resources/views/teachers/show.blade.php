@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3>{{ $teacher->first_name }}'s Profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Subject Performances</h4>
                </div>
                <div class="panel-body">
                    <h5>Graph(line) showing performance changes up or down.</h5>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Lesson Calender</h4>
                </div>
                <div class="panel-body">
                    <h3>Embed a calender here</h3>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="">Lesson Plan</h4>
                </div>
                <div class="panel-body">
                    <h3>Build a scrum UI</h3>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Information & Notifications</h4>
                </div>
                <div class="panel-body">
                    {{--<h3 class="text-info">Parent</h3>--}}
                    {{--<hr>--}}
                    {{--<h4>{{ $teacher->parents_names }}</h4>--}}
                    {{--<p>{{ $teacher->parents_phone_number }}</p>--}}
                    <div class="alert alert-info">There are no pending notifications.</div>
                    <div class="alert alert-success">School fees cleared on time. Thank you.</div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="/{{$teacher->photo_url}}" alt="photo" class="img-rounded img-responsive">
                    <a href="/teachers/edit/{{$teacher->id}}">
                        <h4>{{ $teacher->name }} {{ $teacher->age }}</h4>
                    </a>
                    <p>{{ $teacher->level->name ?? '' }}</p>
                    <p class="small">{{ $teacher->address}}</p>
                </div>
                <div class="panel-footer">
                    <a href="/teachers/edit/{{ $teacher->id }}" class="btn btn-success form-control"> Edit Information</a>
                </div>
            </div>
        </div>
    </div>
@endsection