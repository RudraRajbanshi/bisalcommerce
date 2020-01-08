@extends('layouts.front.default')

@section('content')


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

<h3>Change Password</h3>
<form action = "{{ url('user/changepassword') }}" method = 'POST'>
	Old Password : <input type = 'password' name = 'opass' class = 'form-control' ><br>
	New Password : <input type = 'password' name = 'npass' class = 'form-control' ><br>
	Confirm Password : <input type = 'password' name = 'ncpass' class = 'form-control' ><br>
	<input type = 'hidden' name = '_token' value="{{ csrf_token() }}">
	<input type = 'submit' class = 'btn btn-primary'/>
</form>
					
@endsection
