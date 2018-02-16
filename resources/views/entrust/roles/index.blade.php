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
                            <th width="50%">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td width="50%">
                                {{ $role->description }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection