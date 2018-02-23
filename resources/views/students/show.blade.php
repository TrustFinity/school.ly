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
                <h4 class="title"><i class="fa fa-address-card mr-1"></i> Bio Information</h4>
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
                <h4 class="title">
                    <i class="fa fa-money"></i>
                    <span class="mr-1"></span>
                    Fees / Tuition 
                </h4>
                <span><a href="/students/{{$student->id}}/pay-fees" class="primary small-font">Make Payment</a></span>
                <hr class="row">
                @foreach($student->fees as $fee)
                    <h4>
                        <strong>UGX</strong>
                        <span class="money">{{ number_format($fee->amount) }}</span>
                    </h4>
                    <p class="">For term {{ $fee->term }} of {{ $fee->year->year }}. Paid by {{ $fee->payment_method }}.</p>
                @endforeach
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
                <p>{{ $student->level->name ?? '' }}</p>
                <p class="">{{ $student->address}}</p>
            </div>
        </div>
    </div>
</div>
@endsection