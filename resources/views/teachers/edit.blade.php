@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h3>Edit <span>{{ $teacher->name }}'s</span> Profile</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/teachers/{{ $teacher->id }}" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter Name" value="{{ $teacher->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Experience</label>
                            <input name="experience" type="text" class="form-control" id="" placeholder="Enter Experience" value="{{ $teacher->experience}}">
                        </div>
                                <div class="form-group">
                                    <label for="">stream</label>
                            <select name="stream_id" id="inputstream_id" class="form-control" required="required">
                                @foreach ($streams as $stream)
                                    @if ($teacher->stream_id == $stream->id)
                                        <option value="{{ $teacher->stream_id }}" selected>{{ $teacher->stream->name }}</option>
                                    @else
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection