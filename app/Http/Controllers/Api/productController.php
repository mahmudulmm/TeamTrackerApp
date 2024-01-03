<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
       // $this->user = auth('api')->user();
        
    }

    public function product_list(){
       $data= DB::table('products')->where('status',1)->get();
       return response()->json($data);
    }

    public function myorder()  {
        $id= auth('api')->user()->id;
        $data=DB::table('orders')->where('orders.eid',$id)
        ->leftjoin('products','products.id','orders.pid')
        ->leftjoin('mettings','mettings.id','orders.mid')
        ->select('mettings.*','products.name as pname','orders.*')
        ->get();
        return response()->json($data);
    }
}
