@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Teachers</h3>
        </div>
        <div class="col-sm-6">
            <a href="/teachers/create" class="btn btn-success pull-right">Add new Teacher</a>
        </div>
    </div>
    <hr>
    {{ $teachers->links() }}
    <div class="panel">
        <div class="panel-heading">
            @foreach ($teachers as $teacher)
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ $teacher->photo_url }}" alt="Photo" class="img-circle img-responsive">
                    </div>
                    <div class="col-sm-5">
                        <a href="/teachers/{{ $teacher->id }}">
                            <h4>{{ $teacher->name }}</h4>
                        </a>
                        <p>{{ $teacher->experience }}, {{ $teacher->classgroup->name ?? '' }}</p>
                        {{--<td><a href="/teachers/delete/{{ $student->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>--}}
                    </div>
                    <div class="col-sm-6">
                        {{ $teacher->address }}
                    </div>
                </div>
            @endforeach

            {{-- what display is supposed to be here?? --}}
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Experience</th>
                        <th>Classroom</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->experience }}</td>
                        <td>{{ isset($teacher->classroom) ? $teacher->classroom->name : ' '}}</td>
                        <td><a href="/teachers/edit/{{ $teacher->id }}"><button type="button" class="btn btn-priamry">Edit</button></a></td>
                        <td><a href="/teachers/delete/{{ $teacher->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $teachers->links() }}
@endsection