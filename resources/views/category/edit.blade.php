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



	<form action = "{{ url('/category/update') }}" method = 'POST'>
		Category Name: <input type = 'text' name = 'category_name' class = 'form-control' value = "{{ $category['category_name'] }}"/>
		<br>
		Category Description : <textarea class = 'form-control' name = 'category_description'>{{ $category['category_description'] }}</textarea>	
		<br>
		<input type = 'hidden' name = 'id' value = "{{ $category['id'] }}" />
		<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
		<input type = 'hidden' name = '_method' value = 'PUT' />
		<input type = 'submit' value = 'Create' class = 'btn btn-primary' />	
	</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection





