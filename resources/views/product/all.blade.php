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



	<a class = 'btn btn-primary' href = "{{ url('product/create') }}">Create Product</a>

	<table class = 'table table-striped'>
		<tr>
			<td>Product Name</td>
			<td>Qty</td>
			<td>Price</td>
			<td>Image</td>
			<td>Action</td>
		</tr>

		@foreach($products as $c)
		<tr>
			<td>{{ $c['name'] }}</td>
			<td>{{ $c['qty'] }}</td>
			<td>{{ $c['price'] }}</td>
			<td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$c['image'] }}"> </td>
			<td><a style = 'float:left' class = 'btn btn-primary' href = "{{ url('product/edit/'.$c['id']) }}">Edit</a> <form action = "{{ url('product/delete') }}" method = 'POST'>
				<input type = 'hidden' name = 'id' value = "{{ $c['id'] }}" />
				<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
				<input type = 'hidden' name = '_method' value = 'DELETE' />
				<input type = 'submit' class = 'btn btn-danger' value = 'Delete' />
			</form></td>
		</tr>
		@endforeach
	</table>
	{{ $products->links() }}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection


