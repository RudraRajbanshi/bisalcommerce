@extends('layouts.front.default')

@section('content')
	
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
						@if(!$products->isEmpty())
						@foreach($products as $key => $value)

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">

								<?php //featured items contain products that are featured 6 ?>
										<div class="productinfo text-center">
											<img src="{{ asset('uploads/'.$value['image'])}}" alt="" />
											<h2>Rs. {{ $value['price']}}</h2>
											<p>{{ $value['name']}}</p>
											@if(Auth::check())
											<a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											@endif
											<a href="{{ url('product/'.$value['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-plus"></i>View Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rs. {{ $value['price']}}</h2>
												<p>{{ $value['name']}} </p>
												@if(Auth::check())
												<a data-productid = "{{ $value['id'] }}"  class="btn btn-default add-to-cart addtocart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@endif
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-plus"></i>View Details</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									@if(Auth::check())
										<li><a href="{{ url('wishlist/add/'.$value['id']) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									@endif
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class = 'col-sm-12'>
							<p>No products found</p>
						</div>
						@endif
						
					</div><!--features_items-->
					{{ $products->appends(request()->query())->links() }}

@endsection
