@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Levels</h3>
            <p>A listing of all levels in your {{ getPreference()->institution_type }}. this can be applied to secondary schools and it is optional.</p>
        </div>
        <div class="col-sm-6">
            <button data-toggle="modal" data-target="#createLevel" class="btn btn-success pull-right">Add new Level</button>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="center-block">
                <div class="row">
                    <div class="col-xs-2">
                        <h4>Level Name</h4>
                    </div>
                    <div class="col-xs-5">
                        <h4>Has the following subjects</h4>
                    </div>
                    <div class="col-xs-2 pull-right">
                        <h4>Actions</h4>
                    </div>
                </div>
                @foreach ($levels as $level)
                    <div class="row">
                        <div class="col-xs-2">
                            {{ $level->name }}
                        </div>
                        <div class="col-xs-5">
                            {{-- @foreach ($level->subjects as $subject)
                                @if($level->subjects->count() === 0)
                                    <p>There are subjects associated with this level.</p>
                                @endif
                                <p class="badge">{{ $subject->name }}</p>
                            @endforeach --}}
                                <hr>
                        </div>
                        <div class="col-xs-2 pull-right">
                            <div class="btn-group">
                                {{--<a href="/levels/edit/{{ $level->id }}" class="btn btn-default">Edit</a>--}}
                                <form action="/levels/{{ $level->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('Delete') }}
                                    <button class="btn btn-default" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="createLevel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create a new level</h4>
                </div>
                <div class="modal-body">
                    <p>Please do note that level can only be added to subjects but not subjects to levels.
                    see <a href="/subjects/create">subjects creation.</a></p>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="/levels" method="POST" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="provide level name">
                                </div>
                                <button type="submit" class="btn btn-success">Create level</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection