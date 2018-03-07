@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h3>Edit <span>{{ $teacher->name }}'s</span> Profile</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/teachers/{{ $teacher->id }}" method="POST" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">First Name <span class="text-danger">(Required)</span></label>
                                    <input name="first_name" type="text" class="form-control" id="" placeholder="Firstname"
                                        value="{{ old('first_name', $teacher->first_name) }}">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">Middle Name <span class="text-muted">(Optional)</span></label>
                                    <input name="middle_name" type="text" class="form-control" id="" placeholder="Middlename"
                                        value="{{ old('middle_name', $teacher->middle_name) }}">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">Last Name <span class="text-danger">(Required)</span></label>
                                    <input name="last_name" type="text" class="form-control" id=""
                                        value="{{ old('last_name', $teacher->last_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Experience</label>
                            <input name="experience" type="text" class="form-control" id="" placeholder="Enter Experience" 
                                value="{{ old('experience', $teacher->experience) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level_id" id="inputLevel_id" class="form-control">
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}"
                                        {{ $teacher->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Class</label>
                            <select name="class_group_id" class="form-control" required="required">
                                @foreach ($class_groups as $class_group)
                                    <option value="{{ $class_group->id }}" 
                                        {{ $teacher->class_group_id == $class_group->id ? 'selected' : '' }}>
                                            {{ $class_group->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="inputGender" class="form-control" required="required">
                                @foreach(['Male', 'Female'] as $gender)
                                    <option value="{{ $gender }}" {{ $teacher->gender == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">{{ $teacher->first_name }}'s date of birth?</label>
                            <input name="dob" type="date" class="form-control" value="{{ old('dob', $teacher->dob->toDateString() ) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone_number" type="text" class="form-control" 
                                value="{{ old('phone_number', $teacher->phone_number) }}">
                        </div>

                        <div class="form-group">
                            <label for="joining_year">When did {{ $teacher->first_name }} join the school?</label>
                            <p class="small text-danger">This is required</p>
                            <input name="joining_year" type="date"
                                   class="form-control" value="{{ old('joining_year', $teacher->joining_year->toDateString() ) }}">
                        </div>

                         <div class="form-group">
                            <label for="">What is {{ $teacher->first_name }}'s next of kin names name?
                             <span class="text-danger">(Required)</span></label>
                            <input name="next_of_kin_names" type="text" class="form-control" required 
                                   value="{{ old('next_of_kin_names', $teacher->next_of_kin_names) }}">
                        </div>

                        <div class="form-group">
                            <label for="">What is {{ $teacher->first_name }}'s next of kin names phone number?
                            </label>
                            <input name="next_of_kin_phone_number" type="tel" class="form-control"
                                   value="{{ old('next_of_kin_phone_number', $teacher->next_of_kin_phone_number) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Where does {{ $teacher->first_name }} currently live?</label>
                            <textarea name="address" type="text" class="form-control" rows="4">{{ old('address', $teacher->address) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection