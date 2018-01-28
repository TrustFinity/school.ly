@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Enter Results for {{ $examination->name }}</h3>
            <p>Select the class and subject to start entering student results.</p>
        </div>
    </div>
    <hr>
    <enter-results
        :class_groups="{{ json_encode($class_groups) }}"
        :examination="{{ json_encode($examination) }}"
    ></enter-results>

@endsection