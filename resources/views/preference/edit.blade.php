@extends('layouts.app')

@section('content')
    <h3>{{ $preferences->school->name }} Preferences</h3>
    <hr>
    <form action="/settings/{{ $preferences->id }}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row col-xs-6 col-xs-offset-3">
                    <div class="form-group">
                        <label for="name">School Name</label><span class="text-danger"> (Required)</span>
                        <p class="">The name of your school/institution.</p>
                        <input type="text" id="name" class="form-control" value="{{ old('name', $preferences->school->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Institutions' Type</label><span class="text-danger"> (Required)</span>
                        <p class="">Your school institutions' type.</p>
                        <select name="institution_type" id="institutions_type" class="form-control">
                            @foreach(['Secondary', 'University', 'Primary', 'Pre-School'] as $option)
                                <option value="{{ $option }}"
                                        @if(old('institution_type', $preferences->institution_type) == $option)
                                            selected
                                        @endif>{{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Instructors' Type</label><span class="text-danger"> (Required)</span>
                        <p class="">Your institution instructors type.</p>
                        <select name="instructors_type" id="instructors_type" class="form-control">
                            @foreach(['Teachers', 'Lecturers'] as $option)
                                <option value="{{ $option }}"
                                        @if(old('instructors_type', $preferences->instructors_type) == $option)
                                        selected
                                        @endif>{{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Attendants' Type</label><span class="text-danger"> (Required)</span>
                        <p class="">Your institutions' attendants' type.</p>
                        <select name="attendants_type" id="attendants_type" class="form-control">
                            @foreach(['Students', 'Pupils'] as $option)
                                <option value="{{ $option }}"
                                        @if(old('attendants_type', $preferences->attendants_type) == $option)
                                        selected
                                        @endif>{{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="name">Grading System</label><span class="text-danger"> (Required)</span>
                        <p class="">The grade thresholds of your institution.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Lower grade level (F9)</p>
                                <input type="number" step=".5" id="lower"
                                       class="form-control"
                                       name="lower_grade_level"
                                       value="{{ old('lower_grade_level', $preferences->lower_grade_level) }}">
                            </div>
                            <div class="col-xs-6">
                                <p>Upper grade level (D1)</p>
                                <input type="number" step=".5" id="upper"
                                       class="form-control"
                                       value="{{ old('upper_grade_level', $preferences->upper_grade_level) }}"
                                       name="upper_grade_level">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="row col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success" type="submit">Update Preferences</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection