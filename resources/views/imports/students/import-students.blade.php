@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-info">Import Students</h3>
            <p>Download the data template provided and use it to enter all student data before resubmitting it for import. </p>
        </div>
    </div>

    <hr>

    <div class="panel panel-default">
        <div class="panel-heading">
            Guidelines
        </div>
        <div class="panel-body">
            <p>1. Required Fields</p>
            <ol>
                <li>stream_id</li>
                <li>level_id</li>
                <li>first_name</li>
                <li>last_name</li>
                <li>gender (Either <code>Male</code> or <code>Female</code>)</li>
                <li>dob</li>
                <li>joining_year</li>
            </ol>

            <p>2. Use the <code>stream_id</code> from the table below to record the student Streams</p>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Stream</td>
                        <td>stream_id</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($streams as $stream)
                        <tr>
                            <td>{{ $stream->name }}</td>
                            <td>{{ $stream->id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p>3. Use the <code>level_id</code> from the table below</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Level</td>
                        <td>level_id</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($levels as $level)
                        <tr>
                            <td>{{ $level->name }}</td>
                            <td>{{ $level->id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif


            <h3>Import File Form:</h3>
            <form style="border: 1px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                <input type="file" name="import_file" />

                {{ csrf_field() }}

                <br/>

                <button class="btn btn-primary">Import CSV or Excel File</button>
            </form>
        </div>
    </div>

@endsection
