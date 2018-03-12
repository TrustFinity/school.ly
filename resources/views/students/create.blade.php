@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">New {{ getPreference()->attendants_type }}</h3>
            <p>Answer the simple questions carefuly and you will be done in no time</p>
        </div>
        <div class="col-sm-6">
            <a href="/students" class="btn btn-default pull-right">Back to {{ getPreference()->attendants_type }}</a>
        </div>
    </div>
    <hr>

    <form action="/students" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3>Personal Information</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Provide a firstname <span class="red">(Required)</span></label>
                                    <input name="first_name" type="text" class="form-control"
                                           value="{{ old('first_name', $student->first_name) }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Middlename <span class="gray">(Optional)</span></label>
                                    <input name="middle_name" type="text" class="form-control"
                                           value="{{ old('middle_name', $student->middle_name) }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">{{ getPreference()->attendants_type }} lastname <span class="red">(Required)</span></label>
                                    <input name="last_name" type="text" class="form-control" value="{{ old('last_name', $student->last_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Gender <span class="red">(Required)</span></label>
                                    <select name="gender" id="input" class="form-control" required="required">
                                        @foreach(['Male', 'Female'] as $gender)
                                            <option value="{{ $gender }}" {{ $student->gender === $gender ? 'selected' :'' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ getPreference()->attendants_type }} date of birth 
                                        <span class="red">(Required)</span></label>
                                    <input name="dob" type="date" class="form-control" value="{{ old('dob', $student->dob) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">{{ getPreference()->attendants_type }} photo <span class="gray">(Optional)</span></label>
                            <input name="photo_url" type="file" class="form-control">
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
                            <label for="">Parents/Guardians names
                             <span class="gray">(Optional)</span></label>
                            <input name="parents_names" type="text" class="form-control"
                                   value="{{ old('parents_names', $student->parents_names) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Parents/Guardians phone number <span class="gray">(Optional)</span></label>
                            <input name="parents_phone_number" type="tel" class="form-control"
                                   value="{{ old('parents_phone_number', $student->parents_phone_number) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">{{ getPreference()->attendants_type }} residence 
                                <span class="gray">(Optional)</span></label>
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
                            <label for="uneb_number">PLE / UCE / UACE index number. 
                             <span class="gray">(Optional)</span></label>
                            <input name="uneb_number" type="text" placeholder="U0098/10/156" 
                                   class="form-control" value="{{ old('uneb_number', $student->uneb_number) }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ getPreference()->attendants_type }} level <span class="red">(Required)</span></label>
                                    <p class="small">Only applicable to secondary school students.</p>
                                    <select name="level_id" id="inputLevel_id" class="form-control" required="required">
                                        @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stream_id">{{ getPreference()->attendants_type }} stream
                                     <span class="red">(Required)</span></label>
                                    <p class="small">It can be a current class or the next class they are starting.</p>
                                    <select name="stream_id" id="stream_id" class="form-control" required="required">
                                        @foreach ($streams as $stream)
                                        <option value="{{ $stream->id }}" {{ $stream->id === $student->stream_id ? 'selected' : '' }}>
                                            {{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="joining_year">{{ getPreference()->attendants_type }} joining year 
                             <span class="red">(Required)</span></label>
                            <input name="joining_year" type="date"
                                   class="form-control" value="{{ old('joining_year', $student->joining_year) }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Submit Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
