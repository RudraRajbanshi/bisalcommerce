@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

	<form action = "{{ url('/page/edit') }}" method = 'POST'>
		Page Name: <input type = 'text' class = 'form-control' name = 'page_name'  value = "{{ $page['page_name'] }}" />
		<br>
		Content Description : <textarea class = 'form-control' name = 'content'>{{ $page['content']}}</textarea>	
		<br>
		<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
		<input type = 'hidden' name = '_method' value = 'PUT' />

		<input type = 'hidden' name = 'id' value = "{{ $page['id'] }}" />
		<input type = 'submit' value = 'Edit' class = 'btn btn-primary' />	
	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








