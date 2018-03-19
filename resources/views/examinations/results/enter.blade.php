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
    <p>
        Take some extra care when entering because we <strong>don't</strong> support editting marks <strong>properly</strong> yet.
        <span>New entered marks for a subject will update the existing one. Mke sure its what you want to do before proceeding.</span>
    </p>
    <hr>
    <div class="panel panel-default">
        <form action="/students/{{$student->id}}/examination/{{$examination->id}}/save-result" method="POST">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label>Existing marks.</label><br>
                            @if(count($examination->results) == 0)
                                <code>No marks recorded yet for this student.</code>
                            @endif
                            @foreach($examination->results as $result)
                                <code>
                                    <span>{{$result->subject->name}} <span class="ml-5">{{$result->marks}}%</span></span>
                                </code>
                                <br>
                            @endforeach
                        </code>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        @if(count($student->subjects) == 0)
                            <div class="alert alert-warning">
                                <p>Looks like <strong>{{ $student->name }}</strong> 
                                    doesn't have any subjects. Please add from the 
                                    <a href="/students/{{$student->id}}"><strong>profile.</strong></a></p>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        @foreach($student->subjects as $subject)
                            <div class="form-group">
                                <label>{{ $subject->name }} - {{ $subject->code }}</label>
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