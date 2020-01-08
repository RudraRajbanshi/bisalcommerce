@extends('layouts.front.default')

@section('content')
	
<div class="blog-post-area">
						<h2 class="title text-center">{{ $page['page_name'] }}</h2>
						<div class="single-blog-post">
							
							<p>{{ $page['content'] }}</p>
							
						</div>
						
					</div>

					

@endsection
