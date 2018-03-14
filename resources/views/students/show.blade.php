@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <h3 class="title">{{ $student->first_name }}'s Profile</h3>
        </div>
        <div class="col-xs-6">
            <div class="btn-group pull-right">
                <a href="/students/{{ $student->id }}/edit" class="btn btn-default">
                    <i class="fa fa-copy mr-1"></i>Edit Profile
                </a>
                <a href="/students/{{ $student->id }}/edit-photos" class="btn btn-default">
                    <i class="fa fa-camera-retro mr-1"></i>Update Photo
                </a>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="title"><i class="fa fa-address-card mr-1"></i> Bio Information</h5>
            </div>
            <div class="panel-body">
                <h5 class="title">Parent / Guardian</h5>
                <hr>
                <h5 class="text-info"><strong></strong></h5>
                <h5><i class="fa fa-user-circle mr-1"></i>{{ $student->parents_names }}</h5>
                <p><i class="fa fa-phone-square mr-1"></i>{{ $student->parents_phone_number }}</p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="title">
                    <i class="fa fa-money"></i>
                    <span class="mr-1"></span>
                    Fees / Tuition 
                </h5>
                <span><a href="/students/{{$student->id}}/pay-fees" class="primary small-font">Make Payment</a></span>
                <hr class="row">
                @if(count($student->fees) == 0)
                    <div class="alert alert-info">
                        <h4>{{ $student->first_name }} hasn't made any payments yet.</h4>
                    </div>
                @endif
                @foreach($student->fees as $fee)
                    <h4>
                        <strong>UGX</strong>
                        <span class="money">{{ number_format($fee->amount) }}</span>
                    </h4>
                    <p class="">For term {{ $fee->term }} of {{ $fee->year->year }}. Paid by {{ $fee->payment_method }}.</p>
                @endforeach
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="title">
                            <i class="fa fa-tasks"></i>
                            <span class="mr-1"></span>
                            Subjects
                        </h5>
                    </div>
                </div>
                <hr class="row">
                <div class="row">
                    <div class="col-sm-6 border-r" style="border-right: 1px solid #ccc;">
                        <form action="/students/{{ $student->id }}/subjects" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subjects">Select subject <span class="red">(Required)</span></label>
                                <select name="subject_id" id="subject" class="form-control">
                                    @foreach($all_subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }} - {{ $subject->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default mt-1" type="submit">Add Subject</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        @if(count($student->subjects) == 0)
                            <div class="alert alert-info">
                                <h5>{{ $student->first_name }} doesn't have any subjects yet</h5>
                            </div>
                        @endif
                        @foreach($student->subjects as $subject)
                            <span class="badge badge-primary blue">{{ $subject->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="title">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="mr-1"></span>
                    Promotion
                </h5>
                <hr class="row">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="/students/{{ $student->id }}/promote" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subjects">Promote {{ $student->first_name }} to the next class <span class="red">(Required)</span></label>
                                <p>This is to be done at the end of the year when {{ $student->first_name }} passes exams.</p>
                                <select name="stream_id" id="stream" class="form-control">
                                    @foreach($all_streams as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default mt-1" type="submit">Promote / Demote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="{{ $student->photo_url ?: '/img/person.png'}}" alt="photo" 
                    class="img-rounded img-responsive img-thumbnail profile-img">
            </div>
            <div class="panel-footer">
                <a href="/students/{{$student->id}}/edit">
                    <h4>{{ $student->name }}, {{ $student->age }}</h4>
                </a>
                <p>{{ $student->level->name ?? '' }}, {{ $student->stream->name}}</p>
                <p class="">{{ $student->address}}</p>
            </div>
        </div>
    </div>
</div>
@endsection