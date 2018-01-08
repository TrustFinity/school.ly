@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">{{ getPreference()->instructors_type }}</h3>
            <p>A listing of all the {{ getPreference()->instructors_type }} registered on the platform both support and permanent.</p>
        </div>
        <div class="col-sm-6">
            <a href="/teachers/create" class="btn btn-success pull-right">Add new {{ getPreference()->instructors_type }}</a>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <search-teachers :url="'/api/v1/search/teachers'"
                                 :resource="'teachers'">
                </search-teachers>
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