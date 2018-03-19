@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-info">Edit {{ $examination->name }}</h3>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/examinations/{{ $examination->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="panel-body">
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">Name <span class="red"> (Required)</span></label>
                    <p class="small">Title of the examination to be scheduled. <span class="yellow">For example End of Term One</span></p>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $examination->name) }}" required>
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="term">Term <span class="red"> (Required)</span></label>
                    <select name="term_id" id="term" class="form-control">
                        @foreach($terms as $term)
                            <option value="{{ $term->id }}" 
                                {{ $term->id == old('term', $examination->term_id) ? 'selected' : '' }}>
                                {{ $term->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">Start Date <span class="red"> (Required)</span></label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('name', $examination->start_date->toDateString()) }}">
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2">
                    <label for="name">End Date <span class="red"> (Required)</span></label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('name', $examination->end_date->toDateString()) }}">
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn btn-success ml-1">Create Examination</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection