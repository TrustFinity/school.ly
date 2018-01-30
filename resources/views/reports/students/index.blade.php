@extends('layouts.app')
@section('content-full-screen')
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-info">
                {{ getPreference()->attendants_type }} Report
            </h3>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{ $students->links() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Filter {{ getPreference()->attendants_type }}</h4>
                    <p class="small">Filter {{ getPreference()->attendants_type }} that joined between the chosen dates.</p>
                </div>
                <div class="panel-body">
                    <form action="/reports/students">
                        <div class="form-group">
                            <label for="starting_date">From</label>
                            <input type="date" name="starting_date" class="form-control" value="{{ $joining_start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="closing_date">To</label>
                            <input type="date" name="closing_date" class="form-control" value="{{ $joining_stop_date }}">
                            {{--<date-picker :name="'closing_date'" :value="{{ \Carbon\Carbon::now() }}">--}}
                            {{--</date-picker>--}}
                        </div>
                        <button type="submit" class="btn btn-success form-control">
                            Filter {{ getPreference()->attendants_type }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ getPreference()->attendants_type }}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Stream</th>
                                <th>Joining Year</th>
                                <th>Parent/Guardian Name</th>
                                <th>Parent/Guardian Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td><a href="/{{ $student->id }}">{{ $student->name }}</a></td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->stream->name }}</td>
                                    <td>{{ $student->joining_year->year }}</td>
                                    <td>{{ $student->parents_names }}</td>
                                    <td>{{ $student->parents_phone_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection