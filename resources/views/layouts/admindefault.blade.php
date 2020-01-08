<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<ul>
	<li>Home</li>
	<li>About</li>
	<li>Contact</li>
</ul>

	@if(\Session::has('msg'))
	<div class = 'alert alert-success'>
		<p>{{ \Session::get('msg') }}</p>
	</div></br>
	@endif 

	@if($errors->any())
	<div class = 'alert alert-danger'>
		<ul>
			@foreach($errors->all() as $e)
			<li>{{ $e }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	@yield('content')

<footer>Just a test footer.</footer>
</body>
</html>