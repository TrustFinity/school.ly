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
            @if($examinations->count() === 1)
                <h4>Your school doesn't have any examinations recorded.</h4>
            @else
                <table class="table table-hover table-striped">
                    <th>
                        <td>Name</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td colspan="2">Results</td>
                    </th>
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
                                <a href="#">View Results</a>
                            </td>
                            <td>
                                <a href="#">Enter Results</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@endsection