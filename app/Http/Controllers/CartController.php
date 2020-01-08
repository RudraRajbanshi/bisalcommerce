<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart($id)
    {
    	$product = \App\Product::find($id);
    	$catid = $product->category_id;
    	$bishalcart = Session::get('bishalcart');
    	if($bishalcart == null)
    	{
    		$current_items = 0;
    	}
    	else
    	{
        if(in_array($id, $bishalcart))
        {
    	  $counts = array_count_values($bishalcart);
		  $current_items =  $counts[$id];
        }else
        {
            $current_items = 0;
        }
		}
		$total_products_rem = $product->qty - $current_items;
		if($total_products_rem > 0)
		{
    	if(Session::has('bishalcart'))
    	{
    		$product_array = Session::get('bishalcart');
    	}
    	else
    	{
    		$product_array = array();
    	}
    	$product_array[] = $id;
    	Session::put('bishalcart',$product_array);
    	//return redirect('/category/'.$catid)->with('msg','Product Added to Cart');
        //send response
        return response()->json(['message' => 'Product Added to Cart']);
        

    	}
    	else
    	{
    		//return redirect('/category/'.$catid)->with('msg','Qty Not Available');
            return response()->json(['message' => 'Qty not available']);
        //send response
    	}
    	//if cart is not set
    	//create a new empty array, push the product id in the array and add the array to cart

    	//if cart is already set
    	//pull the array from cart, add the current id in the array and push it in the cart

    }

	public function cart()
	{
		$cart = Session::get('bishalcart');
        //dd($cart);
        $cartnew = array();
        if(is_array($cart))
        {
        $counts = array_count_values($cart);
        $cart_main = array();
        foreach ($counts as $key => $value) {
            $product = \App\Product::find($key);
            $product['cartqty'] = $value;
            $cart_main[] = $product;
        }
        }
        else
        {
            $cart_main = array();
        }
		return view('front/cart',compact('cart_main'));
	}

    public function delete($id)
    {
        $cart = Session::get('bishalcart');
        foreach ($cart as $key => $value) {
         if($value == $id)
         {
            unset($cart[$key]);
         }
        }   
        Session::put('bishalcart',$cart);
       return redirect('/viewcart/')->with('msg','Product Removed From Cart');
    
    }

    public function edit(Request $r)
    {
        $cart = array();
        $toenter = $r->get('qty');
        foreach ($toenter as $key => $value) {
            for ($i=0; $i <$value  ; $i++) { 
                $cart[] = $key;
            }
        }
        Session::put('bishalcart', $cart);
        return redirect('/viewcart/')->with('msg','Cart Updated');
    
    }
}
