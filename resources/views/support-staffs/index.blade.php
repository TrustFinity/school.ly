@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Support Staffs</h3>
            <p>A listing of all the support staffs registered on the platform.</p>
        </div>
        <div class="col-sm-6">
            <a href="/support-staffs/create" class="btn btn-success pull-right">Add Support Staff</a>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <search-support-staff :url="'/api/v1/search/support-staffs'"
                                 :resource="'support_staffs'">
                </search-support-staff>
            </div>
        </div>
    </div>

    {{ $support_staffs->links() }}

    @foreach ($support_staffs as $support_staff)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ $support_staff->photo_url ?: '/img/person.png' }}" alt="Photo" class="img-thumbnail img-responsive">
                    </div>
                    <div class="col-sm-4">
                        <a href="/support-staffs/{{ $support_staff->id }}/edit">
                            <h4>{{ $support_staff->name }}</h4>
                        </a>
                        <p>{{ $support_staff->role }}</p>
                    </div>
                    <div class="col-sm-7">
                        {{ $support_staff->address }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ $support_staffs->links() }}

@endsection