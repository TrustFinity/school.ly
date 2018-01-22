@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">New General Ledger Account</h3>
            <p>This listing of the account will created under <strong>{{ $general_ledger_accounts->name }}</strong>.</p>
        </div>
        <div class="col-sm-6">
            <br>
            <a href="/chart-of-accounts" class="btn btn-default pull-right">Back to Chart of Accounts</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/chart-of-accounts/{{$general_ledger_accounts->id}}/save" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">

                    <div class="form-group">
                        <label for="name">What is the account name?</label><span class="text-danger"> (Required)</span>
                        <p class="">The name of the account you are adding under <strong>{{$general_ledger_accounts->name}}</strong>.</p>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="identifier">What is the account identifier?</label><span class="text-danger"> (Required)</span>
                        <p class="">A valid Chart of Accounts identfier like <strong>{{$general_ledger_accounts->identifier}}</strong>.</p>
                        <input type="text" name="identifier" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="balance">What is the balance of this account?</label><span class=""> (Optional)</span>
                        <p class="">Provide a balance for this account of its there. This is optional or you can leave it zero.</p>
                        <input type="number" name="balance" class="form-control">
                    </div>

                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="row col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success" type="submit">Create Account</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection