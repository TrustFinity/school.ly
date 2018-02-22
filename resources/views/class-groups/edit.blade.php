@extends('layouts.app')

@section('content')
    <div class="row">
        <h3>Edit {{ $class_group->name }}</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/class-groups/{{ $class_group->id }}" method="POST" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" value="{{ $class_group->name }}">
                        </div>

                        <div class="form-group">
                            <select name="level_id" id="level_id" class="form-control">
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update {{ $class_group->name }} data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection