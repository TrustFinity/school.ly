@extends('layouts.app')

@section('content')
    <div class="row">
        <h3>Add a New Class</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/class-groups" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter Name of Class">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection