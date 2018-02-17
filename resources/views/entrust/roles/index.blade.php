@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Roles</h3>
            <p>A list of all roles currently supported. Use this guide to give users appropriate roles for navigating {{ config('app.name') }}.</p>
        </div>
    </div>
    <hr>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th width="40%">Description</th>
                            <th width="40%">Access Scope</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td width="40%">
                                {{ $role->description }}
                            </td>
                            <td width="40%">
                                @foreach($role->resources as $resource)
                                    <span class="badge">{{ $resource->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection