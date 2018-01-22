@extends('layouts.app')

@section('content')
    <h3>School Settings</h3>

    <hr>

    <school-preference
        :levels={{ json_encode('LEVELS') }}
        ></school-preference>

@endsection