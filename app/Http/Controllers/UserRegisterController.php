<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Session;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register()
    {
        return view('register/register');
    }

    public function registerPost(Request $r)
    {
        $v = array(
            'fullname' => 'required|min:2',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:6'
        
        );
        $r->validate($v);
        $data['name'] = $r->get('fullname');
        $data['email'] = $r->get('email');
        $data['password'] = bcrypt($r->get('password'));
        $data['user_type'] = 'customer';

        $user = \App\User::create($data);
        auth()->login($user);
        return redirect('/')->with('msg','Registration Succesful');
        //register the user
    }

    public function login()
    {
        return view('register/login');
    }

    public function loginProcess(Request $r)
    {
        //email and password parameter,
        $data['email'] = $r->get('email');
        $data['password'] = $r->get('password');
        if(Auth::attempt($data) == false)
        {
            return redirect('/user/login')->with('msg','Incorrect Username / Password');
        }
        return redirect('/')->with('msg','Login Successful');
    }



    public function changePassword()
    {
    	return view('register/changePassword');
    }

    public function changePasswordProcess(Request $r)
    {
        $v = array(
            'npass' => 'required|min:6'
        
        );
        $r->validate($v);

        //does the users cpass and ncpass match
        $opass = $r->get('opass');
        $npass = $r->get('npass');
        $ncpass = $r->get('ncpass');
        if($npass != $ncpass)
        {
             return redirect('user/changepassword')->with('msg','Your confirm password doesnot not match');
        }
        $user = Auth::user();
     

        if(!Hash::check($opass,$user['password']))
        {
             return redirect('user/changepassword')->with('msg','Your Old Password doesnot match');
        }

        $user = Auth::user();
        $user->password = bcrypt($npass);
        $user->save();
        return redirect('user/login')->with('msg','Password Changed.');
        //does the users old password match

    }


    public function logout()
    {
        Session::forget('bishalcart');
        auth()->logout();
        return redirect('/')->with('msg','Logged Out');
       
    }
}
