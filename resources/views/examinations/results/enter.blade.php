@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Enter results for {{ $examination->name }}</h3>
        </div>
        <div class="col-sm-6">
            <a href="/students/{{ $student->id }}" class="btn btn-default pull-right">
                <i class="fa fa-chevron-circle-left"></i> Back to {{ $student->first_name }}
            </a>
        </div>
    </div>
    <p>Take some extra care when entering because we <strong>don't</strong> support editting marks <strong>properly</strong> yet.</p>
    <hr>
    <div class="panel panel-default">
        <form action="/students/{{$student->id}}/examination/{{$examination->id}}/save-result" method="POST">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        {{ csrf_field() }}
                        @foreach($student->subjects as $subject)
                            <div class="form-group">
                                <label>{{ $subject->name }} - {{ $subject->code }}</label>
                                {{-- <input type="hidden" name="{{$subject->name}}[id]" value="{{ $subject->id }}"> --}}
                                <input type="text" class="form-control" 
                                    name="{{$subject->name}}[marks]">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn btn-success">Update Results</button>
                    </div>
                </div>
            </div>
        </form>
@endsection