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
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="3">Actions</th>
                    </tr>
                    @foreach($examinations as $exam)
                        <tr>
                            <td>
                                {{ $exam->name }}
                            </td>
                            <td>
                                {{ isset($exam->start_date) ? shortDate($exam->start_date) : '--' }}
                            </td>
                            <td>
                                {{ isset($exam->end_date) ? shortDate($exam->end_date) : '--' }}
                            </td>
                            <td>
                                <a href="/examinations/{{$exam->id}}">View Results</a>
                            </td>
                            <td>
                                <a href="/examinations/{{$exam->id}}/edit">Enter Results</a>
                            </td>
                            <td>
                                <form action="/examinations/{{ $exam->id }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

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