@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Teachers</h3>
            <p>A listing of all the teachers registered on the platform both support and permanent.</p>
        </div>
        <div class="col-sm-6">
            <a href="/teachers/create" class="btn btn-success pull-right">Add new Teacher</a>
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

    {{ $teachers->links() }}

    @foreach ($teachers as $teacher)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="/{{ $teacher->photo_url }}" alt="Photo" class="img-thumbnail img-responsive">
                    </div>
                    <div class="col-sm-4">
                        <a href="/teachers/{{ $teacher->id }}">
                            <h4>{{ $teacher->name }}</h4>
                        </a>
                        <p>{{ $teacher->experience }}, {{ $teacher->classgroup->name ?? '' }}</p>
                    </div>
                    <div class="col-sm-7">
                        {{ $teacher->address }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ $teachers->links() }}

@endsection