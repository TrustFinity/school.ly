@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Class Streams</h3>
        </div>
        <div class="col-sm-6">
            <a href="/streams/create" class="btn btn-md btn-success pull-right">Add New Stream</a>
        </div>
    </div>
    <hr>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class Group</th>
                            <th width="50%"><p class="pull-right">Action</p></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($streams as $stream)
                        <tr>
                            <td>{{ $stream->name }}</td>
                            <td>{{ $stream->classGroup->name }}</td>
                            <td width="50%">
                                <div class="btn-group pull-right">
                                    <a href="/streams/{{ $stream->id }}/edit" class="btn btn-default">Edit</a>
                                    <a href="/streams/delete/{{ $stream->id }}" class="btn btn-default">Delete</a>
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