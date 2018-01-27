@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Support Staff Salaries</h3>
            <p>Create and manage salaries of support staff.</p>
        </div>
        <div class="col-sm-6">
            <br>
            <a href="/transactions/salaries/create" class="btn btn-success pull-right">New Salary Entry</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6">
            {{ $salaries->links() }}
        </div>
    </div>

    @foreach($salaries as $salary)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">
                        Paid on {{ $salary->month->toFormattedDateString() }}
                    </div>
                    <div class="col-sm-4">
                        <h4>{{ $salary->support_staff->name }}</h4>
                        <p>{{ $salary->amount }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p>{{ $salary->liability_gla->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($salaries->count() == 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>There are no school fees entries yet. <a href="/transactions/salaries/create">pay somebody</a></h4>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            {{ $salaries->links() }}
        </div>
    </div>
@endsection