<?php

namespace App\Http\Controllers;
use App\Models\Paymento;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentoController extends Controller
{
    public function __construct()
       {
        $this->middleware('auth:admin');
           
       }

    
    public function paymentop(){
        $paymentos = Paymento::all();
        return view('paymento.paymentop', compact('paymentos'));
       }
         
    public function store(Request $request) {
        $request->validate([
            'name'=>'required|unique:ptypes',
        
        ]);
         Paymento::create([
            'name'=>$request->name,
            'status'=>1
                
        ]);
           return redirect()->route('paymentop');
       }

    public function show(string $id) {
         $data = Paymento::leftJoin('statements', 'paymentos.id', '=', 'statements.aid')
           ->leftjoin('mettings','mettings.id','statements.cid')
                ->select('statements.aid', 'statements.cid', 'statements.order', 'statements.paid', 'statements.balance', 'statements.date','mettings.organization','mettings.name as namec','mettings.designaton','mettings.email')
                ->where('paymentos.id', $id) 
                ->get();
          return view('paymento.show', ['data' => $data]);
}

}