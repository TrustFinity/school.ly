@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Edit {{ $subject->name }}</h3>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="/subjects/{{$subject->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Enter subject name"
                                       value="{{ old('name', $subject->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name="level_id" id="inputlevel_id" class="form-control" required="required">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" {{ $level->id == $subject->level->id ? 'selected':'' }}>{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Teacher</label>
                                <select name="teacher_id" id="inputteacher_id" class="form-control">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $teacher->id == isset($subject->teacher->id) ? 'selected':'' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update {{ $subject->name }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection