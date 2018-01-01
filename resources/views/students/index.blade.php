@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Students</h3>
        </div>
        <div class="col-sm-6">
            <a href="/students/create" class="btn btn-success pull-right">Add new student</a>
        </div>
    </div>
    <hr>
    {{ $students->links() }}
    <div class="panel">
        <div class="panel-body">
            @foreach ($students as $student)
                {{--@if($students->count() >= 0)--}}
                    {{--<h2>There are no students yet.</h2>--}}
                {{--@endif--}}
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ $student->photo_url }}" alt="Photo" class="img-circle img-responsive">
                    </div>
                    <div class="col-sm-5">
                        <a href="/students/{{ $student->id }}">
                            <h4>{{ $student->name }}, {{ $student->age }}</h4>
                        </a>
                        <p>{{ $student->level->name ?? '' }} {{ $student->classroom->name }}</p>
                        @foreach ($student->subjects as $subject)
                            <li>
                                {{ $subject->name }}
                            </li>
                        @endforeach
                        {{--<td><a href="/students/delete/{{ $student->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>--}}
                    </div>
                    <div class="col-sm-6">
                        {{ $student->address }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $students->links() }}
@endsection