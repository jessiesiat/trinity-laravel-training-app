@extends('layout')

@section('content')

<h1>Add Department</h1>

<form action="{{ route('departments.create') }}">
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="name" class="form-control" id="name" placeholder="Name">
	</div>
	<div class="form-group">
	    <label for="description">Description</label>
	    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
	</div>
	<button class="btn btn-primary" type="submit">Add Department</button>
</form>

@stop