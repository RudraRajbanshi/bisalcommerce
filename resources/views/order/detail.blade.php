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



    <h2>Order Details</h2>
	<p>Name: {{ $order['name'] }}</p>
	<p>Phone: {{ $order['phone'] }}</p>
	<p>User Name: {{ $order->user['name'] }}</p>
	<p>Status: {{ $order['status'] }}</p>
	<p>Delivery Location: {{ $order['location'] }}</p>
	<p>Created Date: {{ $order['created_at'] }}</p>

	<h2>Product Details</h2>
	@foreach($finalProduct as $k => $v)
		<p>{{ $v['name'] }} : {{ $v['orderqty'] }}</p>
	@endforeach

	<form action = "{{ url('order/changestatus') }}" method="POST">
	Status : <select name = 'status' class = 'form-control'>
				<option value = 'pending' @if($order['status']=='pending') selected @endif>Pending</option>
				<option value = 'delivered' @if($order['status']=='delivered') selected @endif>Delivered</option>
				<option value = 'cancelled' @if($order['status']=='cancelled') selected @endif>Cancelled</option>
			</select>
			<input type = 'hidden' name = 'orderId' value = "{{ $order['id']}}" />
			<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
			<br>
			<input type = 'submit' class = 'btn btn-primary' />

	</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


