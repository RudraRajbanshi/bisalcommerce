<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class FrontController extends Controller
{
    public function index()
    {
    	//pull 3 featured products with discount
    	$featured_products_slider = \App\Product::where('is_featured','yes')->where('discount','!=','0')->orderBy('created_at','DESC')->limit(4)->get();
    	
    	//pull 6 featured products
    	$featured_products = \App\Product::where('is_featured','yes')->orderBy('created_at','DESC')->limit(6)->get();

    	$category = \App\Category::all();



    	//pull product by categories 4 each and category list
		return view('front/home',compact('featured_products_slider','featured_products','category'));
    }

    public function category($id)
    {
        $products = \App\Product::where('category_id',$id)->paginate(9);
        return view('front/category',compact('products'));

    }

    public function product($id)
    {
        $product = \App\Product::find($id);
        return view('front/product',compact('product'));
    }

    public function page($id)
    {
        $page = \App\Page::find($id);
    	return view('front/page',compact('page'));
    }

    public function contact(){
        return view('front/contact');
    }

    public function contactPost(Request $r){

        $validations = array(
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        );
        $r->validate($validations);

        $name = $r->get('name');
        $subject = $r->get('subject');
        $from = $r->get('email');
        $msg = $r->get('message');

        $data = array('name'=>$name,'subject' => $subject, 'from' => $from,'msg'=>$msg);

        try
        {
            Mail::send(['html'=>'front.mail'], $data, function($message) use($data) {
             $message->to('sagunsiwakoti25@gmail.com', 'Sagun Siwakoti')->subject($data['subject']);
             $message->from($data['from'],$data['name']);
         });
        }
        catch(\Exception $e)
        {
            $mymsg = $e->getMessage();
            echo $mymsg;
        }
       
        return redirect()->back()->with('msg','Email Sent.');


    /*    $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: ".$email;
        $to = 'info@bishalcommerce.com';

          if(mail($to, $subject, $message, $headers))
          {
            $msg = 'Email sent successfully.';
          }
          else
          {
            $msg = 'Email could not be sent.';
          }*/

    }

    public function search(Request $r)
    {
        $name = $r->get('pname');
        $categories = $r->get('categories');
        $pricerange = $r->get('pricerange');
       
        $priceorder = $r->get('orderprice');
        //dd($kaboom);
        $query = \App\Product::select('*');
        if($name != '')
        {
            $query = $query->where("name","LIKE","%$name%");
        }

        if(!empty($categories))
        {
            $query = $query->whereIn("category_id", $categories);
        }

        if(!empty($pricerange))
        {
            $kaboom = explode(',', $pricerange);
            if(!empty($kaboom))
            {
                $from = $kaboom[0];
                $to = $kaboom[1];
            }
            else
            {
               $from = 0; 
               $to = 0;
           }

           if($from == 0 && $to == 0)
           {
            //dont seaarch
           }
           else
           {
               $query = $query->where('price','>=',$from)->where('price','<=',$to);   
           }
       }

        if($priceorder != '')
        {
         $query = $query->orderBy('price',$priceorder);   
        }

        $products = $query->paginate(9);
        
        return view('front/category',compact('products'));


    }
}
