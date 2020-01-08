<div class="col-sm-3">
					<div class="left-sidebar">

					<?php
					$sidebar  = get_sidebar();
					 //pull the data of categories all ?>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							@foreach($sidebar as $key => $value)

							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{ $value }}">{{ $key }}</a></h4>
								</div>
							</div>

							@endforeach
							
						</div><!--/category-products-->
					
					<?php //create a form to make advanced filter that can search from multiple parameter?>
						<div class="price-range"><!--price-range-->

						<form action = "{{ url('searchproduct') }}" method = 'GET'>
							<h2>Search</h2>
							<div class="well text-center">
							<p>Product Name</p>

							@if(\Request::has('pname'))
							@php
							$pname = \Request::get('pname');
							@endphp
							@else
							@php
							$pname = '';
							@endphp
							@endif

							<input type = 'text' class = 'form-control' name = 'pname' value = "{{ $pname }}"/>
							<br>

							@php
							$categories = array();
							@endphp

							@if(\Request::has('categories'))
							@php
							$categories = \Request::get('categories');
							@endphp
							@endif

							<p>Categories</p>
							<select name = 'categories[]' class = 'form-control' multiple>
							@foreach(get_categories() as $k => $v)
							<option value = "{{ $v['id'] }}" @if(in_array($v['id'],$categories)) selected @endif>{{ $v['category_name'] }}</option>
							@endforeach
							</select><br/>

							@if(\Request::has('pricerange'))
							@php
							$pricerange = \Request::get('pricerange');
							@endphp
							@else
							@php
							$pricerange = "0,2000";
							@endphp
							@endif
							<p>Price Range</p>
							 <input name = 'pricerange' type="text" class="span2" value="{{ $pricerange }}" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[{{ $pricerange }}]" id="sl2" ><br />
								 <b class="pull-left">Rs 0</b> <b class="pull-right">Rs 10000</b>
								<br/>
							<p>Order By Price</p>
							<br>

							@if(\Request::has('orderprice'))
							@php
							$orderprice = \Request::get('orderprice');
							@endphp
							@else
							@php
							$orderprice = 'asc';
							@endphp
							@endif

							<select name = 'orderprice'>
								<option value = 'asc'@if($orderprice == 'asc') selected @endif>Lowest First</option>
								<option value = 'desc' @if($orderprice == 'desc') selected @endif>Highest First</option>
							</select>
							<br><br>
							<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
							<input type = 'submit' class = 'btn btn-success' value = 'Search' />
							</div>

						</form>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>