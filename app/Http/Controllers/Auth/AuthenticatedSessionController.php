<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthenticatedSessionController extends Controller
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
            'mobile'   => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::guard('admin')->attempt(['phone' => $request->mobile, 'password' => $request->password], $request->get('remember'))) {
             return redirect('/dashboard');

           
        }
        return back()->withErrors('errors','Login Information is Wrong')->withInput($request->only('mobile', 'remember'));
    }

    public function Logout(Request $request)  {
        Auth::guard('admin')->logout();
        return  redirect()->route('admin-login');
    }
  
   

}