@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-info">New Examination</h3>
            <p>Add new examination set.</p>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/examinations" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">Name <span class="text-danger">(Required)</span></label>
                    <p class="small">Title of the examination to be scheduled. <span class="text-info">For example End of Term One</span></p>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $examination->name) }}" required>
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">Start Date</label>
                    <p class="small">Date when the examinations will begin.</p>
                    <input type="date" name="start_date" class="form-control" value="{{ old('name', $examination->start_date) }}">
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">End Date</label>
                    <p class="small">Date when the examinations will end.</p>
                    <input type="date" name="end_date" class="form-control" value="{{ old('name', $examination->end_date) }}">
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success pull-right">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection