@extends('layouts.app')

@section('content')
    <h3>School Settings</h3>

    <hr>

    <school-preference
        :school="{{ json_encode($school) }}"
        :levels="{{ json_encode('LEVELS') }}"
        ></school-preference>

@endsection