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
        </div>
    </div>
    {{ $teachers->links() }}
@endsection