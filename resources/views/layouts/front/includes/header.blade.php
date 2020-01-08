<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bishal Commerce | Best eCommerce Site in Banepa|Best estore in nepal</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +977-1-4117578</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@bishalcommerce.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a style = 'font-size:20px' href="{{ url('/') }}">BISHAL COMMERCE</a>
							<p>Nepal's No 1 eCommerce Brand</p>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								
							</div>
							
							<div class="btn-group">
								
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">

						<?php 
						//favorite products, change password, logout, mycart OR register
						?>

						@if(Auth::check())
							<ul class="nav navbar-nav">
								
								
								<li><a href="{{ url('viewcart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

								<li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{ url('user/changepassword') }}"><i class="fa fa-lock"></i> Change Password</a></li>

								<li><a href="{{ url('user/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>

							</ul>
						@else
						<ul class="nav navbar-nav">
								<li><a href="{{ url('user/login') }}"><i class="fa fa-lock"></i> Login</a></li>

								<li><a href="{{ url('user/register') }}"><i class="fa fa-lock"></i> Register</a></li>
						</ul>
						@endif
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">

						<?php 
							$menu = get_menu_bar();
							//dd($menu);
						?>
							<ul class="nav navbar-nav collapse navbar-collapse">
							@foreach($menu as $key => $value)
								@if(is_array($value))
								@if(in_array(Request::url(), $value))
								<li class="dropdown"  ><a class = 'active' href="#">{{ $key }}<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    @foreach($value as $k => $v)
                                        <li><a href="{{ $v }}">{{ $k }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @else
                                <li class="dropdown"  ><a href="#">{{ $key }}<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    @foreach($value as $k => $v)
                                        <li><a href="{{ $v }}">{{ $k }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endif

								@else

								@if(Request::url() == $value)

								<li><a href="{{ $value }}" class = 'active' >{{ $key }}</a></li>

								@else
								<li><a href="{{ $value }}" >{{ $key }}</a></li>

								@endif

								@endif
							@endforeach
								
							</ul>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="button" placeholder="Search" value = 'search'/>
						</div>
					</div>


					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->