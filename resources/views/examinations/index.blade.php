@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Examinations</h3>
            <p>Examinations that have been done or that have been scheduled to be done.</p>
        </div>
        <div class="col-sm-6">
            <a href="/examinations/create" class="btn btn-success pull-right">Add New Examination</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            @if($examinations->count() === 0)
                <h4>Your school doesn't have any examinations recorded.</h4>
            @else
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Starts</th>
                        <th>Ends</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($examinations as $exam)
                        <tr>
                            <td>
                                <strong>
                                    {{ $exam->name }}, 
                                </strong>
                                <span class="pink">
                                    Term {{ $exam->term->name }}
                                </span>
                            </td>
                            <td>
                                <p>{{ $exam->start_date->toFormattedDateString() }}</p>
                            </td>
                            <td>
                                <p>{{ $exam->end_date->toFormattedDateString() }}</p>
                            </td>
                            <td>
                                <a href="/examinations/{{$exam->id}}/edit" class="btn btn-default"> Edit</a>
                            </td>
                            <td>
                                <form action="/examinations/{{ $exam->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@endsection