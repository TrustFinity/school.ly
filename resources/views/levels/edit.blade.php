@extends('layouts.app')

@section('content')
    <div class="row">
        <h3>Edit {{ $level->name }} Level</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/levels/{{ $level->id }}" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="" value="{{ $level->name }}">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection