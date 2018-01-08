@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Levels</h3>
            <p>A listing of all levels in your {{ getPreference()->institution_type }}. this can be applied to secondary schools and it is optional.</p>
        </div>
        <div class="col-sm-6">
            <a href="/levels/create" class="btn btn-success pull-right">Add new Level</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="center-block">
                <div class="row">
                    <div class="col-xs-2">
                        <h4>Level Name</h4>
                    </div>
                    <div class="col-xs-5">
                        <h4>Has dive following subjects</h4>
                    </div>
                    <div class="col-xs-2 pull-right">
                        <h4>Actions</h4>
                    </div>
                </div>
                @foreach ($levels as $level)
                    <div class="row">
                        <div class="col-xs-2">
                            {{ $level->name }}
                        </div>
                        <div class="col-xs-5">
                            @foreach ($level->subjects as $subject)
                                <p class="badge">{{ $subject->name }}</p>
                            @endforeach
                                <hr>
                        </div>
                        <div class="col-xs-2 pull-right">
                            <div class="btn-group">
                                <a href="/levels/edit/{{ $level->id }}" class="btn btn-default">Edit</a>
                                <a href="/levels/delete/{{ $level->id }}" class="btn btn-default">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection