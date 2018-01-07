@extends('layouts.app')

@section('content')

    <legend>Add a new Student</legend>

    <form action="/students" method="POST" role="form">
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="input" class="form-control" required="required">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <input name="dob" type="date" class="form-control" >
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" type="text" class="form-control" rows="4" placeholder="Enter Student Address"></textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">Classroom</label>
                            <select name="classroom_id" id="inputClassroom_id" class="form-control" required="required">
                                @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Level</label>
                        <select name="level_id" id="inputLevel_id" class="form-control" required="required">
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" required="required" title="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Create Student</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
