@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Support Staff Attendance</h3>
            <p>Record daily atteandances of support staffs to manage them properly.</p>
        </div>
    </div>
    <hr>

    <attendance-component
        v-cloak 
        :resources="{{ json_encode($support_staffs) }}"
        :baseurl="'{{ '/api/v1/attendances/support-staffs/save' }}'"
        :resources_name="'support-staffs'">
    </attendance-component>
     
@endsection