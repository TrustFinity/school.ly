@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3>{{ $student->first_name }}'s Profile</h3>
        </div>
    </div>
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Academics Performances</h4>
            </div>
            <div class="panel-body">
                <h5>Graph(line) showing performance changes up or down.</h5>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Fees / Tuition</h4>
            </div>
            <div class="panel-body">
                <h5>Pending payment notification and termly payment history</h5>
                <h5>payment information, pending balances, payment amounts and more.</h5>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="">Academics Results</h4>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    {{--Changes subject name color based on grading performance--}}
                    <li class="list-group-item"><span class="text-danger">English</span> <span class="badge">35</span></li>
                    <li class="list-group-item"><span class="text-success">Math</span> <span class="badge">80</span></li>
                    <li class="list-group-item"><span class="text-info">History</span> <span class="badge">55</span></li>
                    <li class="list-group-item"><span class="">Literature in English</span> <span class="badge">60</span></li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="" class="btn btn-success"> Generate Report</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Information & Notifications</h4>
            </div>
            <div class="panel-body">
                {{--<h3 class="text-info">Parent</h3>--}}
                {{--<hr>--}}
                {{--<h4>{{ $student->parents_names }}</h4>--}}
                {{--<p>{{ $student->parents_phone_number }}</p>--}}
                <div class="alert alert-info">There are no pending notifications.</div>
                <div class="alert alert-success">School fees cleared on time. Thank you.</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="/{{$student->photo_url}}" alt="photo" class="img-rounded img-responsive">
                <a href="/students/edit/{{$student->id}}">
                    <h4>{{ $student->name }} {{ $student->age }}</h4>
                </a>
                <p>{{ $student->level->name ?? '' }}</p>
                <p class="small">{{ $student->address}}</p>
            </div>
            <div class="panel-footer">
                <a href="/students/edit/{{ $student->id }}" class="btn btn-success form-control"> Edit Information</a>
            </div>
        </div>
    </div>
</div>
@endsection