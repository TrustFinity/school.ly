@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">School Fees</h3>
            <p>Create and manage schools fees.</p>
        </div>
        <div class="col-sm-6">
            <br>
            <a href="/transactions/school-fees/create" class="btn btn-success pull-right">New School Fee Entry</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6">
            {{ $school_fees->links() }}
        </div>
    </div>

    @foreach($school_fees as $school_fee)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">
                        {{ $school_fee->created_at->toFormattedDateString() }}
                    </div>
                    <div class="col-sm-4">
                        <h4>{{ $school_fee->expense_gla->name }}</h4>
                        <p>{{ $school_fee->amount }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p>{{ $school_fee->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($school_fees->count() == 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>There are no school fees entries yet. <a href="/transactions/school-fees/create">Create some</a></h4>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            {{ $school_fees->links() }}
        </div>
    </div>
@endsection