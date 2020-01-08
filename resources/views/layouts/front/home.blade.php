@include('layouts.front.includes.header')
@if(\Session::has('msg'))
	<div class = 'alert alert-success'>
		<p>{{ \Session::get('msg') }}</p>
	</div></br>
	@endif
@yield('content')
@include('layouts.front.includes.footer')