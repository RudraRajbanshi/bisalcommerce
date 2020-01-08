<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class OrderController extends Controller
{
 

    public function addOrder(Request $r)
    {
    	$items = $r->get('qty');
    	$items = serialize($items);
    	$order = new \App\Order;
    	$order->name = $r->get('fullname');	
    	$order->email = $r->get('email');	
    	$order->phone = $r->get('phone');	
    	$order->address = $r->get('address');	
    	$order->location = $r->get('location');	
    	$order->user_id = Auth::user()->id;	
    	$order->items = $items;
    	$order->status = 'pending';
    	$order->save();
    	Session::forget('bishalcart');
    	return redirect()->back()->with('msg','Order Made Succesfully. We will call you asap.');	
    }

    public function view()
    {
        $orders = \App\Order::orderBy('created_at','DESC')->paginate(10);
       
        return view('order/order',compact('orders'));
    }


    public function viewdetail($id)
    {
        $finalProduct = array();
        $order = \App\Order::find($id);
        $product = $order['items'];
        $product = unserialize($product);
        $i = 0;
        foreach ($product as $key => $value) {
            $products = \App\Product::find($key);
            $finalProduct[$i] = $products;
            $finalProduct[$i]->orderqty = $value;
            $i++;
            //$finalProduct[] = \App\product::find($key);
        }
     return view('order/detail',compact('finalProduct','order'));
    }

    public function changestatus(Request $r)
    {
        $order = \App\Order::find($r->get('orderId'));
        $order->status = $r->get('status');
        $order->save();
        return redirect('order/viewdetail/'.$r->get('orderId'))->with('msg','Status Changed');
 
    }

    public function searchOrder(Request $r)
    {
        $status = $r->get('status');
        $orders = \App\Order::where('status',$status)->orderBy('created_at','DESC')->paginate(10);
       
        return view('order/order',compact('orders'));

    }
}
