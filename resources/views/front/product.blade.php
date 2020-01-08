@extends('layouts.front.default')

@section('content')

<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset('uploads/'.$product['image'])}}" alt="" />
								
							</div>
						

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $product['name'] }}</h2>
								
								<img src="images/product-details/rating.png" alt="" />
								<span>
									@if($product['discount'] != 0)
									<span style = 'text-decoration: line-through'>Rs. {{ $product['price'] }}</span>
									@endif
									<span>Rs. {{ $product['price'] - ($product['discount']*$product['price']/100) }}</span>
									
									@if(Auth::check())
											<a href="{{ url('cart/add/'.$product['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											@endif
								</span>
								<p><b>Qty:</b> {{ $product['qty'] }}</p>
								<p><b>Discount:</b>{{  $product['discount'] }}</p>
								<p class = 'showmore' style = 'overflow:hidden; height: 100px;'><b>Detail:</b> {{ $product['detail'] }}</p>
								<a style = 'cursor:pointer' class = 'readmore'>Read More</a>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					

@endsection
