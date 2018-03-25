@extends('layouts.app')

@section('content')
    <div class="row no-print">
        <div class="col-sm-6">
            <h3 class="text-info">
                <strong>{{ $student->first_name }}s</strong> 
                results for 
                <strong>{{ $examination->name }}</strong>
            </h3>
            <p>Press CTRL+P to print.</p>
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
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 class="text-center">
                        <strong>
                            {{ Auth::user()->school->name }}
                        </strong>
                    </h1>
                    <h3 class="text-center mt-r-1">{{ $examination->name }}, {{ $examination->term->name }}</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <strong>Name: {{ $student->name }}</strong>
                </div>
                <div class="col-sm-1">
                    <strong>Age: {{ $student->age }}</strong>
                </div>
                <div class="col-sm-3">
                    <strong>Class/Stream: {{ $student->stream->name }}</strong>
                </div>
            </div>
            <hr>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="indigo" width="30%">Subjects</th>
                        <th class="indigo" width="7.5%">Marks</th>
                        {{-- <th class="indigo" width="7.5%">BoT</th>
                        <th class="indigo" width="7.5%">MT</th>
                        <th class="indigo" width="7.5%">EoT</th> --}}
                        <th class="indigo" width="7.5%">Grade</th>
                        <th class="indigo" width="40%">Teachers Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($examination->results as $result)
                        <tr>
                            <td width="30%">
                                <strong>{{ $result->subject->name }}</strong>
                            </td>
                            <td width="7.5%">
                                <strong>{{ $result->marks }}</strong>
                            </td>
                            {{-- <td width="7.5%"></td>
                            <td width="7.5%"></td> --}}
                            <td width="7.5%">
                                <strong>{{grade($result->marks)}}</strong>
                            </td>
                            <td width="40%"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            {{-- <button class="btn btn-primary no-print js-print">Print Result</button> --}}
            <strong>Aggregate ...............................................................</strong>
            <strong>Division ................................................................................</strong>
            <br>
            <strong>Position in Class ..............................................................</strong>
            <strong>Out of ..........................................................................</strong>
            <br>
            <strong>Class teacher's report ....................................................................................................................................................................................</strong>
            <br>
            <strong>Headteacher's report ....................................................................................................................................................................................</strong>
        </div>
    </div>
@endsection