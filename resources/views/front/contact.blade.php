@extends('layouts.front.default')

@section('content')



<h3>Contact Us</h3>
<form action = "{{ url('/contact') }}" method = 'POST'>
	Name : <input type = 'text' name = 'name' class = 'form-control' value = "{{ old('name') }}" ><br>
	Email : <input type = 'text' name = 'email' class = 'form-control' value = "{{ old('email') }}" ><br>
	Subject : <input type = 'text' name = 'subject' class = 'form-control' value="{{ old('subject') }}" ><br>
	Message : <textarea name="message" class="form-control" value="{{ old('message') }}"></textarea><br>
	<input type = 'hidden' name = '_token' value="{{ csrf_token() }}">
	<input type = 'submit' class = 'btn btn-primary'/>
</form>
					
@endsection
