@extends('layout')

@section('content')

<h1>Edit Department</h1>

<form action="{{ route('departments.edit', $department->id) }}">
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" class="form-control" id="name" placeholder="Name" value="{{$department->name}}">
	</div>
	<div class="form-group">
	    <label for="description">Description</label>
	    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">{{$department->description}}</textarea>
	</div>
	<button class="btn btn-primary" type="submit">Save Department</button>
</form>

@stop