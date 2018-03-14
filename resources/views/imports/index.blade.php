@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-info">Data Imports</h3>
            <p>Import bulk school data to get started quickly. To get started, download the template and use it to enter data to be imported. </p>
        </div>
    </div>

    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-responsive table-striped">
                <tr>
                    <td>Students</td>
                    <td><a href="{{ url('studentTemplate') }}">Download Template</a></td>
                    <td><a href="/imports/students">Import Student Data</a></td>
                </tr>
                {{-- <tr>
                    <td>Teachers</td>
                    <td><a href="/download-template">Download Template</a></td>
                    <td><a href="/import-excel">Import Student Data</a></td>
                </tr>
                <tr>
                    <td>Support Staff</td>
                    <td><a href="/download-template">Download Template</a></td>
                    <td><a href="/import-excel">Import Student Data</a></td>
                </tr> --}}

                {{-- todo pius: add imports for results --}}

            </table>
        </div>
    </div>

@endsection