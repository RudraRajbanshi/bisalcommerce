<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
    	return view('category/create_category');
    }

    public function store(Request $r)
    {
    	$validations = array(
    		'category_name' => 'required|min:3|unique:categories',
    		
    		);
    	$r->validate($validations);

    	$category = new \App\Category; //created a instance of model $category
    	//for the model the database columns are its properties
    	$category->category_name = $r->get('category_name');
    	//the instance's property category_name is assigned a value
    	$category->category_description = $r->get('category_description');
    	//the instance's property category_description is assigned a value
    	$category->save();
    	//the instance is then saved to the database
    	return redirect('category/create')->with('msg','Category Added Successfully');
    }

    public function view()
    {
       //select the data from table
       $categories = \App\Category::paginate(3);
       return view('category/all',compact('categories')); 
    }

    public function edit($id)
    {
        $category = \App\Category::find($id);
        return view('category/edit',compact('category'));
    }

    public function update(Request $r)
    {
        $validations = array(
            'category_name' => 'required|min:2',
                   
        );
        $r->validate($validations); 
        $id = $r->get('id');
        $category = \App\Category::find($id);
        $category->category_name = $r->get('category_name');
        $category->category_description = $r->get('category_description');
        $category->save();
        return redirect('category/edit/'.$id)->with('msg','Category has been Updated');
    }

    public function delete(Request $r)
    {
        $id = $r->get('id');
        $category = \App\Category::find($id);
        $category->delete($id);
        return redirect('category/read')->with('msg','Deleted Successfully');
    }
}
