<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  	public function add($id)
  	{
  		$wishlistold = \App\Wishlist::where('product_id',$id)->count();

  		if(empty($wishlistold))
  		{
  		$wishlist = new \App\Wishlist;
  		$wishlist->product_id = $id;
  		$wishlist->user_id = Auth::user()->id;
  		$wishlist->save();
  		return redirect()->back()->with('msg','Added to Wishlist');
  		}
  		else
  		{
  		return redirect()->back()->with('msg','Already in Wishlist');
  		}
  	}

  	public function wishlist()
  	{
  		$wishlist = \App\Wishlist::where('user_id',Auth::user()->id)->get();
  		return view('front/wishlist',compact('wishlist'));	

  	}

  	public function delete($id)
  	{
  		\App\Wishlist::where('product_id',$id)->delete();
  		return redirect()->back()->with('msg','Product Removed From Wishlist');

  	}
}
