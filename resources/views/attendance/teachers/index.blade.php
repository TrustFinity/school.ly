@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">{{ getPreference()->instructors_type }} Attendances</h3>
            <p>Record daily atteandances of {{ getPreference()->instructors_type }} to manage them properly.</p>
        </div>
    </div>
    <hr>

    <attendance-component
        v-cloak 
        :resources="{{ json_encode($teachers) }}"
        :baseurl="'{{ '/api/v1/attendances/teachers/save' }}'"
        :resources_name="'teachers'">
    </attendance-component>
     
@endsection