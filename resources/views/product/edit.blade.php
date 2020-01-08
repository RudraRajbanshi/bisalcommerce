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

<form action = "{{ url('product/edit') }}" method = 'POST' enctype="multipart/form-data">

	Product name : <input type = 'text' class = 'form-control' name = 'pname' value = "{{ old('pname',$product['name']) }}" /><br>
	Qty : <input type = 'text' name = 'qty' class = 'form-control' value = "{{ old('qty',$product['qty']) }}"/><br>

	Price : <input type = 'text' name = 'price' class = 'form-control' value = "{{ old('price',$product['price']) }}"/><br>
	Discount : <input type = 'text' name = 'discount' class = 'form-control' value = "{{ old('discount',$product['discount']) }}"/><br>

	Is Featured : Yes<input type = 'radio' name = 'featured' value = 'yes' @if(old('featured',$product['is_featured']) == 'yes') checked @endif/>
	No<input type = 'radio' name = 'featured' value = 'no' @if(old('featured',$product['is_featured']) == 'no') checked @endif/>
	<br>
	<br>
	<img src = "{{ URL::to('/').'/uploads/'.$product['image'] }}" height="120px" />
	<br>

	Image(if changing) : <input type = 'file' class = 'form-control' name = 'image' /><br>

	Choose Category : <select class = 'form-control' name = 'categoryid'>
		@foreach($categories as $value)	
		<option value="{{ $value['id'] }}" @if(old('categoryid',$product['category_id']) == $value['id']) selected @endif>{{ $value['category_name'] }}</option>
		@endforeach
	</select><br>

	Detail : <textarea class = 'form-control' name = 'detail'>{{ old('detail',$product['detail']) }}</textarea><br>
	<input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
	<input type = 'hidden' name = 'id' value = "{{ $product['id']}}" />
	<input type = 'hidden' name = '_method' value = 'PUT' />
	<input type = 'submit' class = 'btn btn-primary'/>

</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection











