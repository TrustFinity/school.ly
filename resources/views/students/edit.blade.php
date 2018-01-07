@extends('layouts.app')

@section('content')
<div class="container">
    <legend>Edit {{ $student->name }}</legend>

	<form action="/students/{{ $student->id }}" method="POST" role="form">
		{{ csrf_field() }}
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter Name" value="{{ $student->name }}">
                        </div>
                        <div class="form-group">
                        <label for="">SEX</label>
                        <select name="gender" id="input" class="form-control" required="required">
                        @if ($student->gender == 'Male')
                            <option>Male</option>
                        @else
                            <option>Female</option>
                        @endelse
                        @endif
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input name="age" type="text" class="form-control" placeholder="Enter Age" value="{{ $student->age }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control"
                                      placeholder="Enter Address">{{ old('address', $student->address) }}
                            </textarea>
                        </div>

                        <div class="form-group">
                        <label for="">Classroom</label>
                        <select name="classroom_id" id="inputClassroom_id" class="form-control" required="required">
                            @foreach ($classrooms as $classroom)
                            @if ($student->classroom_id == $classroom->id)
                            <option value="{{ $student->classroom_id }}" selected>{{ $student->classroom->name }}</option>
                            @else
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endelse
                            @endif
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label for="">Level</label>
                        <select name="level_id" id="inputLevel_id" class="form-control" required="required">
                            @foreach ($levels as $level)
                            @if ($student->level_id == $level->id)
                            <option value="{{ $student->level_id }}" selected>{{ $student->level->name }}</option>
                            @else
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endelse
                            @endif
                            @endforeach
                        </select>
                        </div>

					</div>
				</div>
			</div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Update Information</button>
                    </div>
                </div>
            </div>
    	</div>
	</form>
</div>
@endsection