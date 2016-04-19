<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Training</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<style>
	body {
		padding-bottom: 70px;
	}
	table form {
		display: inline-block;
	}
	</style>
</head>
<body>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Laravel Training App</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li {{ Request::is('departments*') ? 'class=active' : '' }}><a href="{{route('departments.index')}}">Departments</a></li>
	        <li {{ Request::is('students*') ? 'class=active' : '' }}><a href="{{route('students.index')}}">Students</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	
	<div class="container">
		@yield('content')
	</div>

</body>
</html>