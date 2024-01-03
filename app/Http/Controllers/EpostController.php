<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epost;

class EpostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function emppost(){
        $eposts = Epost::all();
        return view('emposts.emppost', compact('eposts'));
       }
         
    public function store(Request $request) {
           $request->validate([
               'name'=>'required|unique:eposts',
               'code'=>'required|unique:eposts',
                'status'=>'string',
           ],
           [
               'danger' => 'You have to choose the file!',
           ]);
           Epost::create([
               'name'=>$request->name,
               'salary'=>$request->salary,
               'code'=>$request->code,
               'status'=>1
                
           ]);
           return redirect()->route('emposts.emppost');
       }
}