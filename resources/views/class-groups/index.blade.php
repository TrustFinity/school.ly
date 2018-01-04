@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-6">
                <h4><b>Class Groups</b></h4>
            </div>
            <div class="col-sm-6">
                <a href="/class-groups/create" class="btn btn-md btn-success pull-right">+ Add New Class Group</a>
            </div>
            <hr>

            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Has the following streams</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($class_groups as $class_group)
                            <tr>
                                <td>{{ $class_group->id }}</td>
                                <td>{{ $class_group->name }}</td>
                                <td>
                                    @foreach ($class_group->streams  as $stream)
                                        <li>{{ $stream->name }}</li>
                                    @endforeach
                                </td>
                                <td><a href="/class-groups/edit/{{ $class_group->id }}" class="btn btn-primary">Edit</a></td>
                                <td><a href="/class-groups/delete/{{ $class_group->id }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection