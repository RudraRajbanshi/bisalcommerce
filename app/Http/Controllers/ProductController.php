<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File; 

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
    	$categories = \App\Category::all();
    	return view('product/create',compact('categories'));
    }

    public function store(Request $request)
    {
    	//validations
    	$validations = array(
    		'pname' => 'required',
    		'qty' => 'required|integer',
    		'price' => 'required',
    		'image' => 'mimes:jpeg,bmp,png,gif|max:800'
    	);
    	$name = '';
    	$request->validate($validations);
		if($request->hasfile('image'))
    	{	
    		$file = $request->file('image');
    		$name = date('ymdhis').$file->getClientOriginalName();
    		$path = public_path().'/uploads/';
    		$file->move($path, $name);
    	}
    	//image size validation, image type validation
    	$product = new \App\Product;
    	$product->name = $request->get('pname');
    	$product->qty = $request->get('qty');
    	$product->price = $request->get('price');
    	$product->image = $name;
    	$product->detail = $request->get('detail');
    	$product->discount = $request->get('discount');
    	$product->is_featured = $request->get('featured');
    	$product->category_id = $request->get('categoryid');
    	$product->save();
    	return redirect('/product/create')->with('msg','Product Created Successfully');
    }

    public function view()
    {
    	$products = \App\Product::paginate(3);
    	return view('product/all',compact('products'));
    }

    public function edit($id)
    {
        $categories = \App\Category::all();
        $product = \App\Product::find($id);
        return view('product/edit',compact('categories','product'));
    }

    public function update(Request $r)
    {
        //validation
        $validations = array(
            'pname' => 'required',
            'qty' => 'required|integer',
            'price' => 'required',
            'image' => 'mimes:jpeg,bmp,png,gif|max:800'
        );
        $id = $r->get('id');
        $r->validate($validations);
        $product = \App\Product::find($id);
        if($r->hasFile('image'))
        {
            $file = $r->file('image');
            $name = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path,$name);
            $product->image = $name;
        }

        $product->name = $r->get('pname');
        $product->qty = $r->get('qty');
        $product->price = $r->get('price');
        $product->detail = $r->get('detail');
        $product->discount = $r->get('discount');
        $product->is_featured = $r->get('featured');
        $product->category_id = $r->get('categoryid');
        $product->save();
        return redirect('product/edit/'.$id)->with('msg','Product Updated Successfully');
        //save the record
    }

    public function delete(Request $r)
    {
        $id = $r->get('id');
        $product = \App\Product::find($id);
        $image_path = public_path()."/uploads/".$product['image'];
        if(File::exists($image_path)) {
        File::delete($image_path);
        }
        $product->delete();
        return redirect('product/read')->with('msg','Product Removed');
    }

}
