@extends('layouts.app')

@section('content')
    <div class="row no-print">
        <div class="col-sm-6">
            <h3 class="text-info">
                <strong>{{ $student->first_name }}s</strong> 
                results for 
                <strong>{{ $examination->name }}</strong>
            </h3>
        </div>
        <div class="col-sm-6">
        	<a href="/students/{{ $student->id }}" class="btn btn-default pull-right">
        		<i class="fa fa-chevron-circle-left"></i> Back to {{ $student->first_name }}
        	</a>
        </div>
    </div>
    <hr class="no-print">
    <div class="panel panel-default">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body">
            <code>{{ $student->results }}</code>
        </div>
        <div class="panel-footer">
            
        </div>
    </div>
@endsection