@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h4><b>Class Streams</b></h4>
        </div>
        <div class="col-sm-6">
            <a href="/streams/create" class="btn btn-md btn-info pull-right">Add New Stream</a>
        </div>

        <hr>

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Class Group</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($streams as $stream)
                        <tr>
                            <td>{{ $stream->id }}</td>
                            <td>{{ $stream->name }}</td>
                            <td>{{ $stream->classGroup->name }}</td>
                            <td><a href="/streams/edit/{{ $stream->id }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="/streams/delete/{{ $stream->id }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection