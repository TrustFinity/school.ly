@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <a href="/class-groups/create"><button type="button" class="btn btn-lg btn-info">Add a new classgroup</button></a>
        <hr><br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Group Name</th>
                        <th>Has the following Classrooms</th>
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
                        {{-- @foreach ($class_group->classrooms  as $classroom)
                        <li>{{ $classroom->name }}</li>
                        @endforeach --}}
                        </td>
                        <td><a href="/class-groups/edit/{{ $class_group->id }}"><button type="button" class="btn btn-priamry">Edit</button></a></td>
                        <td><a href="/class-groups/delete/{{ $class_group->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection