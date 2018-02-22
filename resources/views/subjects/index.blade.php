@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-info">Subjects</h3>
        </div>
        <div class="col-md-6">
            <a href="/subjects/create" class="btn btn-success pull-right">Add a new subject</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover table-responsive table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Teacher</th>
                    <th><p class="pull-right">Action</p></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->level->name }}</td>
                        <td>{{ $subject->teacher->name }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="/subjects/{{ $subject->id }}/edit" class="btn btn-default">Edit</a>
                                <a href="/subjects/delete/{{ $subject->id }}" class="btn btn-default">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection