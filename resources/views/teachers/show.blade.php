@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <h3>{{ $teacher->first_name }}'s Profile</h3>
        </div>
        <div class="col-xs-6">
            <div class="btn-group pull-right">
                <a href="/teachers/{{ $teacher->id }}/edit" class="btn btn-default">Edit Profile</a>
                <a href="/teachers/{{ $teacher->id }}/edit-photos" class="btn btn-default">Update Photo</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Kin's information</h4>
                </div>
                <div class="panel-body">
                    <h4>{{ $teacher->next_of_kin_names }}</h4>
                    <p>{{ $teacher->next_of_kin_phone_number }}</p>
                </div>
            </div>
            {{-- This is an experimental feature. Will be for different paying users. --}}
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="">Lesson Plan</h4>
                </div>
                <div class="panel-body">
                    <teacher-kanban
                        :teacher="{{ json_encode($teacher) }}">
                    </teacher-kanban>
                </div>
            </div> --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Subject Performance</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>No. of {{ getPreference()->attendants_type }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacher->subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->students->count() }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                @if($teacher->subjects->count() == 0)
                                    <div class="alert alert-info">
                                        <p>{{ $teacher->name }} doesn't seem to be having any subject assigned.</p>
                                    </div>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="{{$teacher->photo_url ?: '/img/person.png'}}" alt="photo" class="img-rounded img-responsive img-thumbnail">
                </div>
                <div class="panel-footer">
                    <a href="/teachers/{{$teacher->id}}/edit">
                        <h4>{{ $teacher->name }} {{ $teacher->age }}</h4>
                    </a>
                    <p>{{ $teacher->level->name ?? '' }}</p>
                    <p class="small">{{ $teacher->address}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection