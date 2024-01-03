<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Products;
use DB;

class InvoiceController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function allinvoice(){

       
        return view('invoice.allinvoice');
     }



   public function addinvoice($id) {

          $orders = Order::where('orders.id',$id)->leftjoin('employees','employees.id','orders.eid')->leftjoin('products','products.id','orders.pid')->leftjoin('mettings','mettings.id','orders.cid')->leftjoin('paymentos','paymentos.id','orders.pt_type')
        ->select('orders.*','employees.phone','products.*','products.details','products.name as pname','mettings.*','mettings.organization','mettings.name as namec','mettings.designaton','mettings.email','paymentos.*','paymentos.name as namep')->first();

     

        return view('invoice.addinvoice', ['orders'=>$orders
          
        ]);
    
    }
}