@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">View results for {{ $examination->name }}</h3>
        </div>
        <div class="col-sm-6">
        	<a href="/students/{{ $student->id }}" class="btn btn-default pull-right">
        		<i class="fa fa-chevron-circle-left"></i> Back to {{ $student->first_name }}
        	</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <code>{{ $student->results }}</code>
        </div>
    </div>
@endsection