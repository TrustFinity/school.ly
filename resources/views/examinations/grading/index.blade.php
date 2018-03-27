@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Grading Scheme</h3>
            <p>Adjust this according to your school needs</p>
        </div>
        <div class="col-sm-6">
            <button class="btn btn-success pull-right mt-1"
                data-toggle="modal" data-target="#add-grade">
                    New Scheme
            </button>
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
                            <strong class="mr-2">{{ round($grade->minimum_range, 2) }}</strong>
                                - 
                            <strong class="ml-2">{{ round($grade->maximum_range, 2) }}</strong>
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

    <!-- Modal -->
    <div class="modal fade" id="add-grade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/gradings" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">New Grade</h4>
                    </div>
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="minimum_range">Minimum Range <span class="red">(Required)</span></label>
                                    <input type="number" placeholder="Like 80" name="minimum_range" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="maximum_range">Maximum Range <span class="red">(Required)</span></label>
                                    <input type="number" placeholder="Like 100" name="maximum_range" class="form-control">
                                </div>
                            </div>
                            <label for="grade" class="mt-1">Grade <span class="red">(Required)</span></label>
                            <input type="text" name="grade" class="form-control" placeholder="Like D1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save new grade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection