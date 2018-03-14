@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">{{ getPreference()->attendants_type }}</h3>
            <p>A listing of all the {{ getPreference()->attendants_type }} registered on the platform both completed and current.</p>
        </div>
        <div class="col-sm-6">
            <a href="/students/create" class="btn btn-success pull-right">
               <i class="fa fa-user-plus"></i> Add new {{ getPreference()->attendants_type }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <search-student :url="'/api/v1/search/students'" :resource="'students'"></search-student>
            </div>
        </div>
    </div>

    {{ $students->links() }}

    @foreach ($students as $student)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-1">
                        <a href="/students/{{ $student->id }}">
                            <img src="{{ $student->photo_url ?: '/img/person.png' }}" alt="Photo"
                                class="img-thumbnail img-responsive profile-img">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="/students/{{ $student->id }}">
                            <h4>{{ $student->name }}, {{ $student->age }}</h4>
                        </a>
                        <p>
                            {{ $student->level->name ?? '' }}
                            {{-- {{ $student->stream->name }} --}}
                        </p>
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