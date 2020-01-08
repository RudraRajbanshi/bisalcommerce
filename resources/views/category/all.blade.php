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


<a href = "{{ url('category/create') }}" class = 'btn btn-primary
'>Create Category</a>

	<table class = 'table table-striped'>
		<tr>
			<td>Category Name</td>
			<td>Category Description</td>
			<td>Action</td>
		</tr>

		@foreach($categories as $c)
		<tr>
			<td>{{ $c['category_name'] }}</td>
			<td>{{ $c['category_description'] }}</td>
			<td><a class = 'btn btn-primary' style = 'float:left' href = "{{ url('category/edit/'.$c['id']) }}">Edit</a> <form action = "{{ url('category/delete') }}" method = 'POST'>
				<input type = 'hidden' name = 'id' value = "{{ $c['id'] }}" />
				<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
				<input type = 'hidden' name = '_method' value = 'DELETE' />
				<input type = 'submit' value = 'Delete' class = 'btn btn-danger'/>
			</form></td>
		</tr>
		@endforeach
	</table>
	{{ $categories->links() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
