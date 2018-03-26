@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Edit {{ $grading->grade }}</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default pull-right mt-1" href="/gradings">
                Go Back
            </a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <form action="/gradings/{{ $grading->id }}" method="POST">
            <div class="panel-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="minimum_range">Minimum Range <span class="red">(Required)</span></label>
                            <input type="number" placeholder="Like 80" 
                                name="minimum_range" 
                                class="form-control"
                                value="{{ old('minimum_range', round($grading->minimum_range, 2)) }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="maximum_range">Maximum Range <span class="red">(Required)</span></label>
                            <input type="number" placeholder="Like 100" 
                            name="maximum_range" 
                            class="form-control"
                            value="{{ old('maximum_range', round($grading->maximum_range, 2)) }}">
                        </div>
                    </div>
                    <label for="grade" class="mt-1">Grade <span class="red">(Required)</span></label>
                    <input type="text" name="grade" class="form-control" 
                        placeholder="Like D1"
                        value="{{ old('grade', $grading->grade) }}">
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success">Update grade</button>
            </div>
        </form>
    </div>
@endsection