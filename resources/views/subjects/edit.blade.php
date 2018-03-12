@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3>Edit {{ $subject->name }}</h3>
        </div>
        <div class="col-sm-6">
            <a href="/subjects" class="btn btn-default pull-right">Back</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <form action="/subjects/{{ $subject->id }}" method="POST" role="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>Subject Name <span class="red">(Required)</span></label>
                        <input name="name" type="text" class="form-control" value="{{ old('name', $subject->name) }}">
                    </div>
                    <div class="form-group">
                        <label>Subject Code <span class="gray">(Optional)</span></label>
                        <input name="code" type="text" class="form-control" value="{{ old('code', $subject->code) }}">
                    </div>
                    <div class="form-group">
                        <label>Level <span class="red">(Required)</span></label>
                        <p>This is applicable to secondary schools mostly</p>
                        <select name="level_id" id="inputlevel_id" class="form-control" required="required">
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ $level->id == $subject->level->id ? 'selected':'' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Teacher <span class="gray">(Optional)</span></label>
                        <p>You can assign a teacher to this subject later if you'd like.</p>
                        <select name="teacher_id" id="inputteacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $teacher->id == 
                                    ($subject->teacher ? $subject->teacher->id : '') ? 'selected':'' }}>
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
@endsection