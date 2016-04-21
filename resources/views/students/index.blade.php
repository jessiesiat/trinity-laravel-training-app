@extends('layout')

@section('content')

<h1>
	Students
	<a href="{{route('students.create')}}" class="btn btn-sm btn-primary">Add</a>
</h1>
<form action="" method="get" class="form-inline">
	<div class="form-group">
	    <label for="name" class="sr-only">Name</label>
	    <input type="text" name="name" class="form-control" value="{{$query['name']}}" id="name" placeholder="Enter name">
	</div>
	<button class="btn btn-default" type="submit">Filter</button>
</form>
<hr>
<table class="table table-condensed table-striped">
	<thead>
		<tr><th colspan="2">Name</th><th>Department</th><th>Address</th><th>Contact No.</th><th width="105">Actions</th></tr>
	</thead>
	<tbody>
		@foreach($students as $student)
		<tr>
			<td>
				<img src="{{asset($student->photo)}}" alt="" width="100">
			</td>
			<td>
				{{$student->name}}
			</td>
			<td>{{ $student->department ? $student->department->name : '' }}</td>
			<td>{{$student->address}}</td>
			<td>{{$student->contact_no}}</td>
			<td>
				<a href="{{route('students.edit', $student->id)}}" class="btn btn-xs btn-info">Edit</a>
				<form action="{{route('students.destroy', $student)}}" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="_method" value="delete">
					<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-xs">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $students->links() !!}

@stop