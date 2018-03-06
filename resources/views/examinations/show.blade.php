@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">{{ $examination->name }} Results</h3>
            <p>Select the class to view student results.</p>
        </div>
        <div class="col-sm-6">
            <a href="/examinations/{{$examination->id}}/edit" class="btn btn-info pull-right">Enter Results</a>
        </div>
    </div>

    <hr>

    <view-results
        :examination = "{{ json_encode($examination) }}"
        :results = "{{ json_encode($results) }}"
        :streams = "{{ json_encode($streams) }}"
    ></view-results>

@endsection