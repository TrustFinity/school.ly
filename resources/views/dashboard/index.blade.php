@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>School Kanban</h3>
            <p>Kanban is a lean method to manage and improve work across human systems.</p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Financial board.</h2>
                            <p>school financial movement details</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Teachers board.</h2>
                            <p>General teaching planning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>School Dev..</h2>
                            <p>school planning and financing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="glyphicon glyphicon-plus"></i> Create new..</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Some nice school dashboard statistics here.
        </div>
        <div class="panel-body">
        </div>
    </div>
@endsection
