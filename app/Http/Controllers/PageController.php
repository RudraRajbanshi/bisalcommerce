<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
      public function __construct()
      {
         $this->middleware('admin');
      }

   	public function create()
   	{
   		return view('page/create');
   	}

   	public function store(Request $r)
   	{
   		$validations = array(
   			'page_name' => 'required|unique:pages',
   			'content' => 'required'
   		);
   		$r->validate($validations);
   		$page = new \App\Page;
   		$page->page_name = $r->get('page_name');
   		$page->content = $r->get('content');
   		$page->save();
   		return redirect('/page/create')->with('msg','Created Succesfully');
   	}

   	public function view()
   	{
   		$pages = \App\Page::all();
   		return view('page/all',compact('pages'));
   	}

   	public function edit($id)
   	{
   		$page = \App\Page::find($id);
   		return view('page/edit',compact('page'));
   	}

   	public function update(Request $r)
   	{
   		$validations = array(
   			'page_name' => 'required',
   			'content' => 'required'
   		);
   		$id = $r->get('id');
   		$r->validate($validations);

   		$page = \App\Page::find($id);
   		$page->page_name = $r->get('page_name');
   		$page->content = $r->get('content');

   		$page->save();
   		return redirect('page/edit/'.$id)->with('msg','Updated Successfully');
   	}

   	public function delete(Request $r)
   	{
   		$id = $r->get('id');
   		$page = \App\Page::find($id);
   		$page->delete();
   		return redirect('page/read/')->with('msg','Deleted Successfully');

   	}


}
