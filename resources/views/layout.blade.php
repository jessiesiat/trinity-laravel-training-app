<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Training</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<style>
	/*body {
		margin-top: 35px;
	}*/
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
	        <li class="active"><a href="{{route('departments.index')}}">Departments</a></li>
	        <li><a href="#">Students</a></li>
	    </div>
	  </div>
	</nav>
	
	@yield('content')

</body>
</html>