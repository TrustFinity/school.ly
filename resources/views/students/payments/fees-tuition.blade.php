@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">New School Fee Payment</h3>
        </div>
        <div class="col-sm-6">
            <br>
            <a href="/transactions/school-fees" class="btn btn-default pull-right">
            	<i class="	fa fa-hand-o-left mr-1"></i>
            	Back to <strong>{{ $student->last_name }}</strong>
            </a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/students/{{$student->id}}/pay-fees" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">Year</label><span class="text-danger"> (Required)</span>
                                    <p class="">The year this payment is for.</p>
                                    <input type="date" name="year" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="term">Term</label><span class="text-danger"> (Required)</span>
                                    <p class="">which term is this payment for?</p>
                                    <select name="term"
                                            id="term" class="form-control" required>
                                        @foreach(['III', 'II', 'I'] as $term)
                                            <option value="{{ $term }}">{{ $term }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="row">
                        <div class="form-group">
                            <label for="payment_method">How was the fee paid?</label><span class="text-danger"> (Required)</span>
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
                            <label for="equity_account_id">Choose the destination equity account</label><span class="text-danger"> (Required)</span>
                            <p class="">the equity school fees account you want to put money to. To create one, got to the
                                <a href="/chart-of-accounts">Chart of Accounts</a></p>
                            <select name="equity_account_id"
                                    id="equity_account_id" class="form-control" required>
                                @foreach($equity as $equity_account)
                                    <option value="{{ $equity_account->id }}">
                                        {{ $equity_account->identifier }} {{ $equity_account->name }} - {{ $equity_account->balance }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">How much did the {{ getPreference()->attendants_type }} pay?</label>
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
                            <label for="bank_slip_number">If there was a bank slip, provide the slip number.</label><span class=""> (Optional)</span>
                            <p></p>
                            <input type="text" value="{{ old('bank_slip_number') }}" name="bank_slip_number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Save School Fees Record</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection