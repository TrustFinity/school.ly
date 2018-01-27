@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">New Salary</h3>
            <p>Record a salary payment</p>
        </div>
        <div class="col-sm-6">
            <br>
            <a href="/transactions/salaries" class="btn btn-default pull-right">Back Salaries</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/transactions/salaries" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="support_staff_id">Choose the staff you want to pay</label>
                            <span class="text-danger"> (Required)</span>
                            <p></p>
                            <select name="support_staff_id"
                                    id="support_staff_id" class="form-control" required>
                                @foreach($support_staff as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="month">What month is this payment is for?</label>
                            <span class="text-danger"> (Required)</span>
                            <p>Choose the date</p>
                            <input type="date" name="month" class="form-control">
                        </div>
                        <hr class="row">
                        <div class="form-group">
                            <label for="payment_method">How is the salary being paid?</label><span class="text-danger"> (Required)</span>
                            <select name="payment_method"
                                    id="payment_method" class="form-control" required>
                                @foreach($payment_methods as $payment_method)
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
                            <label for="liability_account_id">Choose the destination salary account</label>
                            <span class="text-danger"> (Required)</span>
                            <select name="liability_account_id"
                                    id="liability_account_id" class="form-control" required>
                                @foreach($liabilities as $liability)
                                    <option value="{{ $liability->id }}">
                                        {{ $liability->identifier }} {{ $liability->name }} - {{ $liability->balance }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">How much is being paid?</label>
                            <span class="text-danger"> (Required)</span>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control" required>
                        </div>
                        <hr class="row">
                        <div class="form-group">
                            <label for="receipt_number">Provide the receipt number if there was any.</label><span class=""> (Optional)</span>
                            <p></p>
                            <input type="text" value="{{ old('receipt_number') }}" name="receipt_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cheque_number">If was by cheque, provide a cheque number.</label><span class=""> (Optional)</span>
                            <p></p>
                            <input type="text" value="{{ old('cheque_number') }}" name="cheque_number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Save Salary record</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection