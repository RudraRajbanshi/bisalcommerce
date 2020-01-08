@extends('layouts.front.default')

@section('content')
	
<div class="blog-post-area">
						<h2 class="title text-center">Your Cart</h2>
						<div class="single-blog-post">
						
						<form action = "{{ url('cart/edit') }}" method = 'POST'>	
						<table class = 'table table-striped'>
							<tr>
								<td>Product Name</td>
								<td>Image</td>
								<td>Qty</td>
								<td>Price</td>
								<td>Total</td>
								<td></td>
							</tr>
							<?php $total = 0; ?>
							@foreach($cart_main as $key => $val)
							<tr>
								<td>{{ $val['name'] }}</td>
								<td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$val['image'] }}"></td>
								<td><input max = "{{ $val['qty'] }}" type = 'number' value = "{{ $val['cartqty'] }}" name = "qty[{{ $val['id'] }}]"></td>
								<td>{{ $val['price'] }}</td>
								<td>{{ $val['price']*$val['cartqty'] }} </td>
								<td><a class = 'btn btn-danger' href = "{{ url('cart/delete/'.$val['id']) }}">X</a></td>
							</tr>
							<?php $total = $total + ($val['price']*$val['cartqty']); ?>
							@endforeach
						</table>
						Total Price : {{ $total }}<br>
						<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
						<input type = 'submit' class = 'btn btn-success' value = 'Update Cart'/>
						</form>
						</div>
						<br>	
						<h2 class="title text-center">Checkout</h2>
					<form action = "{{ url('order/add') }}" method = 'POST'>
						Full Name : <input type = 'text' name = 'fullname' class = 'form-control' value = "{{ Auth::user()->name }}" required/><br>
						Email : <input type = 'text' name = 'email' class = 'form-control' value = "{{ Auth::user()->email }}" required/><br>
						Phone No : <input type = 'text' name = 'phone' class = 'form-control' required/><br>
						Address : <input type = 'text' name = 'address' class = 'form-control' required/><br>
						Delivery Location : <input type = 'text' name = 'location' class = 'form-control' required/><br>
						@foreach($cart_main as $key => $val)
						<input max = "{{ $val['qty'] }}" type = 'hidden' value = "{{ $val['cartqty'] }}" name = "qty[{{ $val['id'] }}]">
						@endforeach
						<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' /> 
						<input type = 'submit' class = 'btn btn-primary' />
					</form>

					</div>

					

@endsection
