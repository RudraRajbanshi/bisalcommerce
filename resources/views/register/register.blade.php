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

<h3>Registration Form</h3>
<form action = "{{ url('user/register') }}" method = 'POST'>
	Full Name : <input type = 'text' name = 'fullname' class = 'form-control' value = "{{ old('fullname') }}" ><br>
	Email : <input type = 'text' name = 'email' class = 'form-control' value = "{{ old('email') }}" ><br>
	Password : <input type = 'password' name = 'password' class = 'form-control' ><br>
	Confirm Password : <input type = 'password' name = 'password_confirmation' class = 'form-control' ><br>
	<input type = 'hidden' name = '_token' value="{{ csrf_token() }}">
	<input type = 'submit' class = 'btn btn-primary'/>
</form>
					
@endsection
