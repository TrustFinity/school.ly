@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Create New Subject</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-8 col-md-offset-2">
                    <form action="/subjects" method="POST" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter subject name">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level_id" id="inputlevel_id" class="form-control" required="required">
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Teacher</label>
                            <p>You can assign a teacher to this subject later if you'd like.</p>
                            <select name="teacher_id" id="inputteacher_id" class="form-control">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Create Subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection