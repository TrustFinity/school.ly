@extends('layouts.app')

@section('content')
<h3>Edit {{ $resource->name }} photo.</h3>
<div class="panel panel-default">
	<form action="/{{$resource_type}}/{{$resource->id}}/edit-photos" method="POST" enctype="multipart/form-data">
		<div class="panel-body">
				{{ csrf_field() }}
				<label>Choose the new photo to upload.</label>
				<input type="file" name="photo_url" required class="form-control">
		</div>
		<div class="panel-footer">
			<button class="btn btn-success" type="submit">Upload new</button>
		</div>
	</form>
</div>
@endsection