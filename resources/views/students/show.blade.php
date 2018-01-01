@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">

        </div>
    </div>
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Academics Performances</h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Fees / Tuition</h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Academics Results</h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Information & Notifications</h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="{{$student->photo_url}}" alt="photo" class="img-rounded img-responsive">
                <a href="/students/edit/{{$student->id}}">
                    <h4>{{ $student->name }} {{ $student->age }}</h4>
                </a>
                <p>{{ $student->level->name ?? '' }}</p>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>
@endsection