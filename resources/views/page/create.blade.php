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

<form action = "{{ url('/page/create') }}" method = 'POST'>
		Page Name: <input type = 'text' class = 'form-control' name = 'page_name' />
		<br>
		Content Description : <textarea class = 'form-control' name = 'content'></textarea>	
		<br>
		<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
		<input type = 'submit' value = 'Create' class = 'btn btn-primary'/>	
	</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


