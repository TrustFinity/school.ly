@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Subjects Grading</h3>
            <p>Adjust this according to your school needs</p>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover table-responsive table-striped">
                <thead>
                <tr>
                    <th>Range</th>
                    <th>Grade</th>
                    <th><p class="pull-right">Action</p></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($gradings as $grade)
                    <tr>
                        <td>
                            <strong>{{ round($grade->minimum_range, 2) }}</strong>
                                - 
                            <strong>{{ round($grade->maximum_range, 2) }}</strong>
                        </td>
                        <td>{{ $grade->grade}}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="/gradings/{{ $grade->id }}/edit" class="btn btn-default">Edit</a>
                                <a href="/gradings/delete/{{ $grade->id }}" class="btn btn-default">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection