@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit {{ $support_staff->name }}</h3>
            <p>Complete the simple form below to create a new support staff in the system.</p>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/support-staffs/{{ $support_staff->id}}" method="POST" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="">Supports staff's firstname</label>
                            <input name="first_name" type="text" class="form-control" id="" 
                                placeholder="First Name" 
                                value="{{ old('first_name' ,$support_staff->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's middle name, this is optional</label>
                            <input name="middle_name" type="text" class="form-control" id="" 
                                placeholder="Middle Name" 
                                value="{{ old('middle_name' ,$support_staff->middle_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's lastname</label>
                            <input name="last_name" type="text" class="form-control" id="" 
                                placeholder="Last Name" 
                                value="{{ old('last_name' ,$support_staff->last_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's gender</label>
                            <select name="gender" id="inputGender" class="form-control" 
                                required="required">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Support staff's date of birth?</label>
                            <input name="dob" type="date" class="form-control" 
                                value="{{ old('dob', $support_staff->dob) }}">
                        </div>
                        <div class="form-group">
                            <label for="">What is the support staff's role?</label>
                            <input name="role" type="text" class="form-control" 
                                value="{{ old('role', $support_staff->role) }}"
                                placeholder="Laboratory Assistant">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's phone number</label>
                            <input name="phone_number" type="tel" 
                                class="form-control" 
                                value="{{ old('phone_number', $support_staff->phone_number) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's email, this is optional.</label>
                            <input name="email" type="email" 
                                class="form-control" 
                                value="{{ old('email', $support_staff->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Supports staff's address, this is optional.</label>
                            <textarea name="address" class="form-control">{{ old('address', $support_staff->address) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's next of kin full names.</label>
                            <input name="next_of_kin_full_names" type="tel" 
                                class="form-control" 
                                value="{{ old('next_of_kin_full_names', $support_staff->next_of_kin_full_names) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Supports staff's next of kin phone number</label>
                            <input name="next_of_kin_phone_number" type="tel" 
                                class="form-control" 
                                value="{{ old('next_of_kin_phone_number', $support_staff->next_of_kin_phone_number) }}">
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Submit Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection