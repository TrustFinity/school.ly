@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="text-info">Expenses</h3>
        <p>Create and manage of of your schools expenses.</p>
    </div>
    <div class="col-sm-6">
        <br>
        <a href="/transactions/expenses" class="btn btn-default pull-right">Back to Expenses</a>
    </div>
</div>
<hr>
<div class="panel panel-default">
    <form action="/transactions/expenses" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Expense payment method</label><span class="text-danger"> (Required)</span>
                        <p class="">how this expense is being paid</p>
                        <select name="payment_method" 
                                id="payment_method" class="form-control" required>
                            @foreach(['Cash', 'Cheque'] as $payment_method)
                                <option value="{{ $payment_method }}">{{ $payment_method }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Choose the source asset account</label><span class="text-danger"> (Required)</span>
                        <p class="">the asset account you want to move money from</p>
                        <select name="source_asset_account_id" 
                                id="source_asset_account_id" class="form-control" required>
                            @foreach($assets as $asset)
                                <option value="{{ $asset->id }}">{{ $asset->identifier }} {{ $asset->name }} - {{ $asset->balance }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Choose the destination asset account</label><span class="text-danger"> (Required)</span>
                        <p class="">the expense account you want to put money to. To create a new expense account, got to the 
                            <a href="/chart-of-accounts">Chart of Accounts</a></p>
                        <select name="expense_account_id" 
                                id="expense_account_id" class="form-control" required>
                            @foreach($expenses as $expense)
                                <option value="{{ $expense->id }}">{{ $expense->identifier }} {{ $expense->name }} - {{ $expense->balance }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">How much is the expense?</label><span class="text-danger"> (Required)</span>
                        <input type="number" value="{{ old('amount') }}" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">Was there a receipt for this expense?</label><span class=""> (Optional)</span>
                        <p>Provide the receipt number if there was any.</p>
                        <input type="text" value="{{ old('receipt_number') }}" name="receipt_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cheque_number">Was the expense paid by cheque?</label><span class=""> (Optional)</span>
                        <p>If it was by cheque, provide a cheque number.</p>
                        <input type="text" value="{{ old('cheque_number') }}" name="cheque_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">A description of the expense would help you remember it better.</label>
                        <span class=""> (Optional)</span>
                        <p>This is optional though.</p>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Create Expense</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection