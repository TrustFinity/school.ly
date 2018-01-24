@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="text-info">Expenses</h3>
        <p>Create and manage of of your schools expenses.</p>
    </div>
    <div class="col-sm-6">
        <br>
        <a href="/transactions/expenses/create" class="btn btn-success pull-right">New Expense</a>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-sm-6">
        {{ $expenses->links() }}
    </div>
</div>

@foreach($expenses as $expense)
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    {{ $expense->created_at->toFormattedDateString() }}
                </div>
                <div class="col-sm-4">
                    <h4>{{ $expense->expense_gla->name }}</h4>
                    <p>{{ $expense->amount }}</p>
                </div>
                <div class="col-sm-6">
                    <p>{{ $expense->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if($expenses->count() == 0)
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>There are no expenses created. <a href="/transactions/expenses/create">Create some</a></h4>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-sm-6">
        {{ $expenses->links() }}
    </div>
</div>
@endsection