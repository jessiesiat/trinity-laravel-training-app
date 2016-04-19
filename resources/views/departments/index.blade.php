@extends('layout')

@section('content')

<h1>
Departments
<a href="{{route('departments.create')}}" class="btn btn-xs btn-primary">Add</a>
</h1>

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
				<a href="{{route('departments.edit', $dept->id)}}" class="btn btn-xs btn-info">Edit</a>
				<form action="{{route('departments.destroy', $dept)}}" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="_method" value="delete">
					<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-xs">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop