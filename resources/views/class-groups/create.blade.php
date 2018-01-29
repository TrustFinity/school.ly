@extends('layouts.app')

@section('content')
    <div class="row">
        <h3 class="text-info">Add a New Class</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/class-groups" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Enter name of Class</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <select name="level_id" id="level_id" class="form-control">
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Create Class group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection