@extends('layout')

@section('content')

<h1>Edit Student</h1>

<form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="put">
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" name="name" class="form-control" value="{{$student->name}}" id="name" placeholder="Name">
	</div>
	<div class="form-group">
		<label for="department">Department</label>
		<select name="department_id" id="department" class="form-control" placeholder="Select department">
			@foreach($departments as $dept)
			<option value="{{$dept->id}}" {{ $student->department_id == $dept->id ? 'selected' : '' }}>{{$dept->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" name="address" value="{{$student->address}}" class="form-control" id="address">
	</div>
	<div class="form-group">
		<label for="degree">Degree</label>
		<input type="text" name="degree" class="form-control" value="{{$student->degree}}">
	</div>
	<div class="form-group">
		<label for="contactNo">Contact No.</label>
		<input type="text" name="contact_no" value="{{$student->contact_no}}" class="form-control">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" value="{{$student->email}}" class="form-control">
	</div>
	<div class="form-group">
		<label for="enrolled">Enrolled</label>
		<input type="date" name="enrolled" value="{{ $student->enrolled ? $student->enrolled->format('Y-m-d') : '' }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="photo">Photo</label>
		<input type="file" name="photo">
	</div>
	<div class="form-group">
	    <label for="remarks">Remarks</label>
	    <textarea name="remarks" class="form-control" id="remarks" rows="4" placeholder="Remarks">{{$student->remarks}}</textarea>
	</div>
	<button class="btn btn-primary" type="submit">Update Student</button>
</form>

@stop