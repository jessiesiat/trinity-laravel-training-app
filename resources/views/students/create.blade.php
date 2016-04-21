@extends('layout')

@section('content')

<h1>Add Student</h1>

@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
	@foreach($errors->all() as $error)
	<div class="">{{$error}}</div>
	@endforeach
</div>
@endif

<form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" name="name" class="form-control" id="name" placeholder="Name">
	</div>
	<div class="form-group">
		<label for="department">Department</label>
		<select name="department_id" id="department" class="form-control" placeholder="Select department">
			@foreach($departments as $dept)
			<option value="{{$dept->id}}">{{$dept->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" name="address" class="form-control" id="address">
	</div>
	<div class="form-group">
		<label for="degree">Degree</label>
		<input type="text" name="degree" class="form-control">
	</div>
	<div class="form-group">
		<label for="contactNo">Contact No.</label>
		<input type="text" name="contact_no" class="form-control">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="enrolled">Enrolled</label>
		<input type="date" name="enrolled" class="form-control">
	</div>
	<div class="form-group">
		<label for="photo">Photo</label>
		<input type="file" name="photo">
	</div>
	<div class="form-group">
	    <label for="remarks">Remarks</label>
	    <textarea name="remarks" class="form-control" id="remarks" rows="4" placeholder="Remarks"></textarea>
	</div>
	<button class="btn btn-primary" type="submit">Add Student</button>
</form>

@stop