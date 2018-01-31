@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/teachers" method="POST" role="form">
                {{ csrf_field() }}
                    <legend>Add a new Teacher</legend>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" type="text" class="form-control" id="" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username" type="text" class="form-control" id="" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" type="text" class="form-control" id="" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" id="inputGender" class="form-control" required="required">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">What is the date of birth of the teacher?</label>
                        <input name="dob" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level_id" id="inputLevel_id" class="form-control">
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Class</label>
                        <select name="class_group_id" id="inputstream_id" class="form-control" required="required">
                            @foreach ($class_groups as $class_group)
                            <option value="{{ $class_group->id }}">{{ $class_group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Experience</label>
                        <input name="experience" type="text" class="form-control" id="" placeholder="Enter Experience">
                    </div>
                    <div class="form-group">
                        <label for="joining_year">When did the {{ getPreference()->instructors_type }} join the school?</label>
                        <p class="small text-danger">This is required</p>
                        <input name="joining_year" type="date"
                               class="form-control" value="{{ old('joining_year') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone" type="text" class="form-control" id="" placeholder="Enter Phone">
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="">Password</label>--}}
                        {{--<input type="password" name="password" id="inputPassword" class="form-control" required="required" title="">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Password Confirmation</label>--}}
                        {{--<input type="password" name="password_confirmation" id="inputPassword" class="form-control" required="required" title="">--}}
                    {{--</div>--}}

                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection