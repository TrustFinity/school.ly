@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h4><b>Class Groups</b></h4>
        </div>
        <div class="col-sm-6">
            <a href="/class-groups/create" class="btn btn-md btn-success pull-right">Add New Class Group</a>
        </div>
    </div>
    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Has the following streams</th>
                        <th>
                            <p class="pull-right">Action</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($class_groups as $class_group)
                    <tr>
                        <td>{{ $class_group->name }}</td>
                        <td>
                            @foreach ($class_group->streams  as $stream)
                                <span>{{ $stream->name }}</span><br>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="/class-groups/edit/{{ $class_group->id }}" class="btn btn-default">Edit</a>
                                <a href="/class-groups/delete/{{ $class_group->id }}" class="btn btn-default">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection