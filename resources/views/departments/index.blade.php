@extends('layout')

@section('content')

<h1>Departments</h1>

<table class="table">
	<thead>
		<tr><th>Name</th><th>Description</th><th>Created At</th><th>Updated At</th><th></th></tr>
	</thead>
	<tbody>
		@foreach($departments as $dept)
		<tr>
			<td>{{$dept->name}}</td>
			<td>{{$dept->description}}</td>
			<td>{{$dept->created_at}}</td>
			<td>{{$dept->updated_at}}</td>
			<td>
				<a href="{{route('departments.edit', $dept)}}" class="btn btn-xs btn-info">Edit</a>
				<a href="#" class="btn btn-xs btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop