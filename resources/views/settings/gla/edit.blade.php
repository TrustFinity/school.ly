@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Edit {{ $chart_of_account->name }}</h3>
        </div>
        <div class="col-sm-6">
            <form action="/chart-of-accounts/{{$chart_of_account->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger pull-right">Delete Account</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/chart-of-accounts/{{$chart_of_account->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">

                    <div class="form-group">
                        <label for="name">What is the account name?</label><span class="text-danger"> (Required)</span>
                        <p class="">The name of the account you are adding under <strong>{{$chart_of_account->name}}</strong>.</p>
                        <input type="text" name="name" class="form-control" required
                            value="{{ old('name', $chart_of_account->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="identifier">What is the account identifier?</label><span class="text-danger"> (Required)</span>
                        <p class="">A valid Chart of Accounts identfier like <strong>{{$chart_of_account->identifier}}</strong>.</p>
                        <input type="text" name="identifier" class="form-control" required
                            value="{{ old('identifier', $chart_of_account->identifier) }}">
                    </div>

                    <div class="form-group">
                        <label for="balance">What is the balance of this account?</label><span class=""> (Optional)</span>
                        <p class="text-danger"> This is not recommended. This will cause reports and transactions to not balance.</p>
                        <input type="number" name="balance" class="form-control"
                            value="{{ old('balance', $chart_of_account->balance) }}">
                    </div>

                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="row col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success" type="submit">Update Account</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection