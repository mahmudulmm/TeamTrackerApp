<?php

namespace App\Http\Controllers;
use App\Models\Ptype;
use Illuminate\Http\Request;

class PtypeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function type(){
        $ptypes = Ptype::all();
        return view('ptype.type', compact('ptypes'));
       }
         
    public function store(Request $request) {
           $request->validate([
               'name'=>'required|unique:ptypes',
        
           ]);
           Ptype::create([
               'name'=>$request->name,
               'status'=>1
                
           ]);
           return redirect()->route('type');
       }
}