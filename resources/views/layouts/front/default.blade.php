@include('layouts.front.includes.header')
		
	
	<section>
		<div class="container">
			<div class="row">
			@if(\Session::has('msg'))
	<div class = 'alert alert-success'>
		<p>{{ \Session::get('msg') }}</p>
	</div></br>
	@endif
				@include('layouts.front.includes.sidebar')
				
				<div class="col-sm-9">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	@include('layouts.front.includes.footer')