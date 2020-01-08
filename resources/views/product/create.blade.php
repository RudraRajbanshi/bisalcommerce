@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<h3>Add a New Product</h3>

<form action = "{{ url('product/create') }}" method = 'POST' enctype="multipart/form-data">
	Product name : <input type = 'text' class = 'form-control' name = 'pname' value = "{{ old('pname') }}" /><br>
	Qty : <input type = 'text' class = 'form-control' name = 'qty' value = "{{ old('qty') }}"/><br>
	Price : <input type = 'text' class = 'form-control' name = 'price' value = "{{ old('price') }}"/><br>
	Discount : <input type = 'text' class = 'form-control' name = 'discount' value = "{{ old('discount') }}"/><br>



	Is Featured : Yes<input type = 'radio' name = 'featured' value = 'yes' @if(old('featured') == 'yes') checked @endif/>
	No<input type = 'radio' name = 'featured' value = 'no' @if(old('featured') == 'no') checked @endif/>
	<br><br>
	Image : <input type = 'file' class = 'form-control' name = 'image' /><br>

	Choose Category : <select class = 'form-control' name = 'categoryid'>
		@foreach($categories as $value)	
		<option value="{{ $value['id'] }}" @if(old('categoryid') == $value['id']) selected @endif>{{ $value['category_name'] }}</option>
		@endforeach
	</select><br>
	Detail : <textarea class = 'form-control' name = 'detail'>{{ old('detail') }}</textarea><br>
	<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
	<input type = 'submit' class = 'btn btn-primary' />

</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
