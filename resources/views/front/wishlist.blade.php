@extends('layouts.front.default')

@section('content')
	
<div class="blog-post-area">
						<h2 class="title text-center">Your Wishlist</h2>
						<div class="single-blog-post">
							
						<table class = 'table table-striped'>
							<tr>
								<td>Product Name</td>
								<td>Image</td>
								
								<td>Price</td>
								<td></td>
							</tr>
							@foreach($wishlist as $key => $val)
							<tr>
								<td>{{ $val->product['name'] }}</td>
								<td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$val->product['image'] }}"></td>
								
								<td>{{ $val->product['price'] }}</td>
								
								<td><a class = 'btn btn-danger' href = "{{ url('wishlist/delete/'.$val->product['id']) }}">X</a></td>
							</tr>
							@endforeach
						</table>
						
						
						</div>
						
					</div>

					

@endsection
