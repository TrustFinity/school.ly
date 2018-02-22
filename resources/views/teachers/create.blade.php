@extends('layouts.app')

@section('content')
<h3>Add a new Teacher</h3>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/teachers" method="POST" role="form">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">First Name <span class="text-danger">(Required)</span></label>
                                <input name="first_name" type="text" class="form-control" id="" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Middle Name <span class="text-muted">(Optional)</span></label>
                                <input name="middle_name" type="text" class="form-control" id="" placeholder="Middlename">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Last Name <span class="text-danger">(Required)</span></label>
                                <input name="last_name" type="text" class="form-control" id="" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email <span class="text-muted">(Optional)</span></label>
                        <input name="email" type="text" class="form-control" id="" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="">Gender <span class="text-danger">(Required)</span></label>
                        <select name="gender" id="inputGender" class="form-control" required="required">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="">Experience <span class="text-danger">(Required)</span></label>
                        <input name="experience" type="text" class="form-control" required>
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
                        <label for="joining_year">When did the {{ getPreference()->instructors_type }} join the school? 
                            <span class="text-danger">(Required)</span></label>
                        <input name="joining_year" type="date"
                               class="form-control" value="{{ old('joining_year') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone_number" type="text" class="form-control" id="" placeholder="Enter Phone">
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Please provide the {{ getPreference()->instructors_type }} photo.</label>
                        <input name="photo_url" type="file" class="form-control">
                    </div>  --}} 

                    <div class="form-group">
                        <label for="">What is the {{ getPreference()->instructors_type }} next of kin names name?
                         <span class="text-danger">(Required)</span></label>
                        <input name="next_of_kin_names" type="text" class="form-control" required 
                               value="{{ old('next_of_kin_names') }}">
                    </div>

                    <div class="form-group">
                        <label for="">What is the {{ getPreference()->instructors_type }} next of kin names phone number?
                        </label>
                        <input name="next_of_kin_phone_number" type="tel" class="form-control"
                               value="{{ old('next_of_kin_phone_number') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Where does the {{ getPreference()->instructors_type }} currently live?</label>
                        <textarea name="address" type="text" class="form-control" rows="4">{{ old('address') }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection