@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h4><b>School Levels</b></h4>
        </div>
        <div class="col-sm-6">
            <a href="/levels/create" class="btn btn-md btn-info pull-right">Add New Level</a>
        </div>

        <hr>

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Has the following subjects</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->name }}</td>
                            <td>
                            @foreach ($level->subjects as $subject)
                            <li>{{ $subject->name }}</li>
                            @endforeach
                            </td>
                            <td><a href="/levels/edit/{{ $level->id }}"><button type="button" class="btn btn-priamry">Edit</button></a></td>
                            <td><a href="/levels/delete/{{ $level->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection