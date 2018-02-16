@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Users</h3>
            <p>A listing of users registered in {{ config('app.name') }} with their roles.</p>
        </div>
        <div class="col-md-6">
            <br>
            <a href="/users/create" class="btn btn-success pull-right">Create new User</a>
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
                            <th width="50%">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="/users/{{ $user->id }}/edit">{{ $user->name }}</a></td>
                            <td width="50%">
                                @foreach($user->roles as $role)
                                    <span>{{ $role->name }}</span><br>
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