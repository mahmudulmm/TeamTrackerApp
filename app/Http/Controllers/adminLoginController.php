<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class adminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['showAdminLoginForm','login']]);
           
    }
 
     public function showAdminLoginForm()
    {
        //return Auth::guard('admin')->user();
        if (!empty(Auth::guard('admin')->user())) {
            return redirect('admin/home');
       }else{
        return view('auth.login');
       }
        
    }
 
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
             return redirect('admin/home');

           
        }
        return back()->withErrors('errors','Login Information is Wrong')->withInput($request->only('mobile', 'remember'));
    }

    public function Logout(Request $request)  {
        Auth::guard('admin')->logout();
        return  redirect()->route('admin-login');
    }
  
   

}
