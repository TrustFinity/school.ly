@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h3>Edit {{ $stream->name }}</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/streams/{{ $stream->id }}" method="POST" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" value="{{ $stream->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Class Group</label>
                            <select name="class_group_id" id="inputclass_group_id" class="form-control" required="required">
                                @foreach ($class_groups as $class_group)
                                    @if ($stream->class_group_id === $class_group->id)
                                        <option value="{{ $stream->class_group_id }}" selected>
                                            {{ $stream->classGroup->name }}
                                        </option>
                                    @else
                                        <option value="{{ $class_group->id }}">
                                            {{ $class_group->name }}
                                        </option>
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