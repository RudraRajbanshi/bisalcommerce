<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function displayForm()
    {
    	return view('resultform');	
    }

    public function computeResult(Request $request)
    {
    	$student_name = $request->get('student_name');
    	$sno = $request->get('sno');
    	$java = $request->get('java');

    	if($java > 24)
    	{
    		$status =  'Pass';
    	}
    	else
    	{
    		$status =  'Fail';
    	}
    	return view('marksheet',compact('student_name','sno','java','status'));
    }
}
