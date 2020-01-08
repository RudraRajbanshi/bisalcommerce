@extends('layouts.front.default')

@section('content')


	

<h3>Login Form</h3>
<form action = "{{ url('user/login') }}" method = 'POST'>
	Email : <input type = 'text' name = 'email' class = 'form-control' value = "{{ old('email') }}" ><br>
	Password : <input type = 'password' name = 'password' class = 'form-control' ><br>
	<input type = 'hidden' name = '_token' value="{{ csrf_token() }}">
	<input type = 'submit' class = 'btn btn-primary'/>
</form>
					
@endsection
