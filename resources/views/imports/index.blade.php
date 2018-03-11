@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Data Imports</h3>
        </div>
    </div>

    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-responsive table-striped">
                <tr>
                    <td>Students</td>
                    <td><a href="/download-template">Download Template</a></td>
                    <td><a href="/import-exel">Import Student Data</a></td>
                </tr>
                <tr>
                    <td>Teachers</td>
                    <td><a href="/download-template">Download Template</a></td>
                    <td><a href="/import-exel">Import Student Data</a></td>
                </tr>
                <tr>
                    <td>Support Staff</td>
                    <td><a href="/download-template">Download Template</a></td>
                    <td><a href="/import-exel">Import Student Data</a></td>
                </tr>

                {{-- todo pius: add imports for results --}}

            </table>
        </div>
    </div>

@endsection