@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Chart Of Accounts</h3>
            <p>A listing of all the accounts created for use.</p>
        </div>
    </div>
    <div class="row">
    	<div class="btn-group col-md-6">
    		<a href="/chart-of-accounts?type=A" class="btn btn-{{ $type == 'A' ? 'primary' : 'default' }}">Assets</a>
			<a href="/chart-of-accounts?type=E" class="btn btn-{{ $type == 'E' ? 'primary' : 'default' }}">Equity</a>
			<a href="/chart-of-accounts?type=L" class="btn btn-{{ $type == 'L' ? 'primary' : 'default' }}">Liabilities</a>
			<a href="/chart-of-accounts?type=C" class="btn btn-{{ $type == 'C' ? 'primary' : 'default' }}">Capital</a>
			<a href="/chart-of-accounts?type=X" class="btn btn-{{ $type == 'X' ? 'primary' : 'default' }}">Expenses</a>
		</div>
    </div>
    <hr>
    <div class="panel panel-default">
    	<div class="panel-body">
			@foreach($accounts as $account)
				@include('settings.gla.partials._gla')
			@endforeach
			@if(sizeof($accounts) == 0)
				<h4>There are no accounts yet.</h4>
			@endif
    	</div>
    </div>
@endsection