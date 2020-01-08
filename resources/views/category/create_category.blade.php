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


<form action = "{{ url('/category/create') }}" method = 'POST'>
		Category Name: <input type = 'text' name = 'category_name' class = 'form-control' />
		<br>
		Category Description : <textarea class = 'form-control' name = 'category_description'></textarea>	
		<br>
		<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
		<input type = 'submit' class = 'btn btn-primary' value = 'Create' />	
	</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

