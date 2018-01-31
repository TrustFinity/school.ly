@extends('layouts.app')
@section('content-full-screen')
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-info">
                Support Staff Report
            </h3>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{ $support_staff->links() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Filter {{ getPreference()->instructors_type }}</h4>
                    <p class="small">Filter {{ getPreference()->instructors_type }} that joined between the chosen dates.</p>
                </div>
                <div class="panel-body">
                    <form action="/reports/teachers">
                        <div class="form-group">
                            <label for="starting_date">From</label>
                            <input type="date" name="starting_date" class="form-control" value="{{ $joining_start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="closing_date">To</label>
                            <input type="date" name="closing_date" class="form-control" value="{{ $joining_stop_date }}">
                        </div>
                        <button type="submit" class="btn btn-success form-control">
                            Filter {{ getPreference()->instructors_type }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ getPreference()->instructors_type }}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone number</th>
                            <th>Next of Kins Name</th>
                            <th>Next of Kins Phone</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($support_staff as $staff)
                            <tr>
                                <td><p class="text-primary">{{ $staff->name }}</p></td>
                                <td>{{ $staff->gender }}</td>
                                <td>{{ $staff->phone_number }}</td>
                                <td>{{ $staff->next_of_kin_full_names }}</td>
                                <td>{{ $staff->next_of_kin_phone_number }}</td>
                                <td>{{ $staff->created_at->year }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{ $support_staff->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection