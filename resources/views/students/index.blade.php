@extends('layout')

@section('content')

<h1>
Students
<a href="{{route('students.create')}}" class="btn btn-xs btn-primary">Add</a>
</h1>

<table class="table">
	<thead>
		<tr><th colspan="2">Name</th><th>Department</th><th>Address</th><th>Contact No.</th><th>Updated At</th><th></th></tr>
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

@stop