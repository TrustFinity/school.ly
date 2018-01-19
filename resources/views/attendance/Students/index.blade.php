@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">{{ getPreference()->attendants_type }} Attendances</h3>
            <p>Choose the class that you would like to call the register on.</p>
        </div>
    </div>
    <hr>
    <student-attendance v-cloak
        :streams="{{ json_encode($streams) }}"
        :attendees="'{{ getPreference()->attendants_type }}'">
    </student-attendance> 
@endsection