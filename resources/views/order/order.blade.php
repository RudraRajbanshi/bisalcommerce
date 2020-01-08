@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                <form action = "{{ url('order/searchorder') }}" method="POST">
	Status : <select name = 'status' class = 'form-control'>
				<option value = 'pending'>Pending</option>
				<option value = 'delivered'>Delivered</option>
				<option value = 'cancelled'>Cancelled</option>
			</select>
			<br>
			<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
			
			<input type = 'submit' class = 'btn btn-primary' value = 'Search'/>

			<a class = 'btn btn-success' href = "{{ url('order/view') }}">Clear Filter</a>

	</form>
<br>

	<table class = 'table table-striped'>
		<tr>
			<td>Name</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Address</td>
			<td>User Email</td>
			<td>User Name</td>
			<td>Delivery Location</td>
			<td>Created Date</td>
			<td>Status</td>
			<td>Action</td>
		</tr>

		@foreach($orders as $c)
		<tr>
			<td>{{ $c['name'] }}</td>
			<td>{{ $c['phone'] }}</td>
			<td>{{ $c['email'] }}</td>
			<td>{{ $c['address'] }}</td>
			<td>{{ $c->user['name'] }}</td>
			<td>{{ $c->user['email'] }}</td>
			<td>{{ $c['location'] }}</td>
			<td>{{ $c['created_at'] }}</td>
			<td>{{ $c['status'] }}</td>
			<td><a style = 'float:left' class = 'btn btn-primary' href = "{{ url('order/viewdetail/'.$c['id']) }}">View Detail</a></td>
		</tr>
		@endforeach
	</table>
	{{ $orders->links() }}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection


