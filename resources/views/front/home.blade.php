@extends('layouts.front.home')

@section('content')
<section id="slider"><!--slider-->

<?php //slider contains featured products that have images in descending order no 3?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($featured_products_slider as $key => $value)
							@if($key == 0)
							<li data-target="#slider-carousel" data-slide-to="{{ $key }}" class="active"></li>
							@else

							<li data-target="#slider-carousel" data-slide-to="{{ $key }}"></li>
							@endif

							@endforeach

						</ol>
						
						<div class="carousel-inner">

							@foreach($featured_products_slider as $key => $value)

							@if($key == 0)
							<div class="item active">
								<div class="col-sm-6">
									<h1>{{ $value['name'] }}</h1>
									<h2>Rs. {{ $value['price'] }}</h2>
									
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('uploads/'.$value['image'])}}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							@else

							<div class="item">
								<div class="col-sm-6">
									<h1>{{ $value['name'] }}</h1>
									<h2>Rs. {{ $value['price'] }}</h2>
									
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('uploads/'.$value['image'])}}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							@endif
							@endforeach
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				@include('layouts.front.includes.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>

						@foreach($featured_products as $key => $value)

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">

								<?php //featured items contain products that are featured 6 ?>
										<div class="productinfo text-center">
											<img src="{{ asset('uploads/'.$value['image'])}}" alt="" />
											<h2>Rs. {{ $value['price']}}</h2>
											<p>{{ $value['name']}}</p>
											@if(Auth::check())
											<a href="{{ url('cart/add/'.$value['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											@endif
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rs. {{ $value['price']}}</h2>
												<p>{{ $value['name']}} </p>
												@if(Auth::check())
												<a href="{{ url('cart/add/'.$value['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@endif
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
						
					</div><!--features_items-->
					

					<?php //categorywise products 4 for each category?>
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">

							@foreach($category as $key => $value)
							@if($key == 0)
								<li class="active"><a href="#{{ $value['id']}}" data-toggle="tab">{{ $value['category_name']}} </a></li>
							@else
								<li><a href="#{{ $value['id']}}" data-toggle="tab">{{ $value['category_name']}} </a></li>
							@endif
							@endforeach
							</ul>
						</div>
						<div class="tab-content">

							@foreach($category as $key => $value)
							@if($key == 0)
							<div class="tab-pane fade active in" id="{{ $value['id'] }}">
							@foreach($value->products as $k => $v)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('uploads/'.$v['image'])}}" alt="" />
												<h2>Rs. {{ $v['price'] }}</h2>
												<p>{{ $v['name'] }}</p>
												@if(Auth::check())
												<a href="{{ url('cart/add/'.$v['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@endif
											</div>
											
										</div>
									</div>
								</div>
							@endforeach
							</div>
							@else
							<div class="tab-pane fade in" id="{{ $value['id'] }}">

							@foreach($value->products as $k => $v)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('uploads/'.$v['image'])}}" alt="" />
												<h2>Rs. {{ $v['price'] }}</h2>
												<p>{{ $v['name'] }}</p>
												@if(Auth::check())
												<a href="{{ url('cart/add/'.$v['id']) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												@endif
											</div>
											
										</div>
									</div>
								</div>
							@endforeach
							</div>
							@endif
							@endforeach	
							
						</div>
					</div><!--/category-tab-->
					
					
				</div>
			</div>
		</div>
	</section>
	@stop