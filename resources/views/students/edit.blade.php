@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Edit {{ $student->name }}</h3>
            <p>After updating {{ $student->first_name }}'s information, submit it and you will be done.</p>
        </div>
        <div class="col-sm-6">
            <a href="/students" class="btn btn-default pull-right">Back to {{ getPreference()->attendants_type }}</a>
        </div>
    </div>
    <hr>

    <form action="/students/{{ $student->id }}" method="POST" role="form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <h3>Personal Information</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">What is the first name of the {{ getPreference()->attendants_type }} ?</label>
                            <p class="small">This is a required field.</p>
                            <input name="first_name" type="text" class="form-control"
                                   value="{{ old('first_name', $student->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">What is the middle name of the {{ getPreference()->attendants_type }} ?</label>
                            <p class="small">This is an optional field.</p>
                            <input name="middle_name" type="text" class="form-control"
                                   value="{{ old('middle_name', $student->middle_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">What is the last name of the {{ getPreference()->attendants_type }} ?</label>
                            <p class="small">This is a required field.</p>
                            <input name="last_name" type="text" class="form-control" value="{{ old('last_name', $student->last_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">What gender is the {{ getPreference()->attendants_type }} ?</label>
                            <p class="small">This is required</p>
                            <select name="gender" id="input" class="form-control" required="required">
                                @foreach(['Male', 'Female'] as $gender)
                                    <option value="{{ $gender }}" {{ $student->$gender === $gender ? 'checked' :'' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">How old is the {{ getPreference()->attendants_type }} now ?</label>
                            <p class="small">This is required</p>
                            <input name="age" type="number" class="form-control" value="{{ old('age', $student->age) }}">
                            {{-- {{ Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($student->dob)) }} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h3>Home Information</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">What is the {{ getPreference()->attendants_type }} parents name ?</label>
                            <p class="small">This is a required field.</p>
                            <input name="parents_names" type="text" class="form-control"
                                   value="{{ old('parents_names', $student->parents_names) }}">
                        </div>

                        <div class="form-group">
                            <label for="">What is the {{ getPreference()->attendants_type }} parents phone number ?</label>
                            <p class="small">This is optional</p>
                            <input name="parents_phone_number" type="tel" class="form-control"
                                   value="{{ old('parents_phone_number', $student->parents_phone_number) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Where does the {{ getPreference()->attendants_type }} currently live ?</label>
                            <p class="small">This is a required field. Please provide a detail description of the address.</p>
                            <textarea name="address" type="text" class="form-control" rows="4">{{ old('address', $student->address) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h3>School Information</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="">What stream does the {{ getPreference()->attendants_type }} go to ?</label>
                            <p class="small">This is required, it can be a current class or the next class they are starting.</p>
                            <select name="stream_id" id="inputstream_id" class="form-control" required="required">
                                @foreach ($streams as $stream)
                                    <option value="{{ $stream->id }}" {{ $stream->id === $student->stream_id ? 'checked' : '' }}>
                                        {{ $stream->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">What level is the {{ getPreference()->attendants_type }} ?</label>
                            <p class="small">This is optional, it's only applicable to secondary school students.</p>
                            <select name="level_id" id="inputLevel_id" class="form-control" required="required">
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Update {{ getPreference()->attendants_type }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
