@extends('layouts.app')

@section('content')
    <div class="row">
    	<h3>Add New Class Stream</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/streams" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter name of stream">
                        </div>
                        <div class="form-group">
                            <label for="">Class Group</label>
                            <select name="class_group_id" id="inputclass_group_id" class="form-control" required="required">
                                @foreach ($class_groups as $class_group)
                                    <option value="{{ $class_group->id }}">{{ $class_group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection