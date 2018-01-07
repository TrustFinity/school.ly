@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Students</h3>
            <p>A listing of all the students registered on the platform both completed and current.</p>
        </div>
        <div class="col-sm-6">
            <a href="/students/create" class="btn btn-success pull-right">Add new student</a>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>Search text box will be here</h1>
                <p class="small">It will be an auto complete ajax searche field</p>
            </div>
        </div>
    </div>

    {{ $students->links() }}

    @foreach ($students as $student)
        <div class="panel panel-default">
            <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="{{ $student->photo_url }}" alt="Photo" class="img-circle img-responsive">
                        </div>
                        <div class="col-sm-4">
                            <a href="/students/{{ $student->id }}">
                                <h4>{{ $student->name }}, {{ $student->age }}</h4>
                            </a>
                            <p>{{ $student->level->name ?? '' }} {{ $student->classroom->name }}</p>
                            @foreach ($student->subjects as $subject)
                                <li>
                                    {{ $subject->name }}
                                </li>
                            @endforeach
                        </div>
                        <div class="col-sm-7">
                            {{ $student->address }}
                        </div>
                    </div>
            </div>
        </div>
    @endforeach

    {{ $students->links() }}

@endsection