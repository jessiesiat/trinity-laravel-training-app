@extends('layout')

@section('content')

<h1>Edit Department</h1>

<form action="{{ route('departments.update', $department->id) }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PUT">
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" name="name" class="form-control" id="name" placeholder="Name" value="{{$department->name}}">
	</div>
	<div class="form-group">
	    <label for="description">Description</label>
	    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description">{{$department->description}}</textarea>
	</div>
	<button class="btn btn-primary" type="submit">Save Department</button>
</form>

@stop