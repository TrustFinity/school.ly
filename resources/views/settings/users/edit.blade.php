@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Edit {{ $user->name }}</h3>
        <hr>
        <div class="panel panel-default">
            <form action="/users/{{ $user->id }}" method="POST" role="form">
                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>First Name<span class="text-danger"> (Required)</span></label>
                            <input name="first_name" 
                                type="text" class="form-control"
                                required value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label>Last Name<span class="text-danger"> (Required)</span></label>
                            <input name="last_name" 
                                type="text" class="form-control"
                                required value=" {{ old('last_name', $user->last_name) }} ">
                        </div>
                        <div class="form-group">
                            <label>Gender<span class="text-danger"> (Required)</span></label>
                            <select name="gender" class="form-control" required>
                                @foreach(['Male', 'Female', 'Other'] as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                    @if(old('gender', $user->gender) == $gender)
                                        <option value="{{ $gender }}" selected>{{ $gender }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number<span class="text-muted"> (Optional)</span></label>
                            <input name="telephone_number" 
                                type="tel" class="form-control" value=" {{ old('telephone_number', $user->telephone_number) }}">
                        </div>
                        <div class="form-group">
                            <label>Username<span class="text-danger"> (Required)</span></label>
                            <p>You will need this for login in. This has to be unique.</p>
                            <input name="username" type="text" 
                                class="form-control" placeholder="e.g mwesigwa78"
                                required value="{{old('username', $user->username)}}">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">
                                E-Mail
                                <span class="text-muted"> (Optional)</span></label>
                            <div>
                                <input id="email" type="email" 
                                    class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Role<span class="text-danger"> (Required)</span></label>
                            <p>
                                The role of this user. This role will restrict what they have access to.
                                {{-- <span class="text-primary">You can choose a new role to add to existing ones</span> --}}
                            </p>
                            <select name="role" id="inputteacher_id" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @if(old('role') == $role->id)
                                        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection