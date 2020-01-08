<!DOCTYPE html>
<html>
<head>
	<title>Result Form</title>
</head>
<body>

<form action = "{{ url('computeresult') }}" method = 'POST' >
	Student Symbol No : <input type = 'text' name = 'sno' /><br>
	Student Name : <input type="text" name = 'student_name' /><br>
	Java : <input type = 'text' name = 'java' /><br>
	<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' /> 


	<input type = 'submit' />
</form>
</body>
</html>