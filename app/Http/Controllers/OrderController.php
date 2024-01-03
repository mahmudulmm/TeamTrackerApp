<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Metting;
use App\Models\Metting_time;
use App\Models\Mettinghost;
use App\Models\Products;
use App\Models\Ptype;
use App\Models\Paymento;
use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use DB;
use PDF;



class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    public function allorder()
    {

        $orders = Order::leftjoin('mettings', 'mettings.id', 'orders.cid')
            ->leftjoin('products', 'products.id', 'orders.pid')
            ->select('orders.*', 'mettings.organization', 'mettings.name as namec', 'mettings.designaton', 'mettings.email', 'products.details', 'products.name')
            ->get();

        return view('order.allorder', ['orders' => $orders]);
    }

    public function addorder($id)
    {

        $metting_times = Metting_time::where('id', $id)->first();


        $eidValue = $metting_times->eid;
        $midValue = $metting_times->mid;
        $pidValue = $metting_times->pid;
        $cidValue = $metting_times->cid;
        $ptypes = Ptype::all();
        $paymentos = Paymento::all();

        return view('order.addorder', [
            'eidValue' => $eidValue,
            'midValue' => $midValue,
            'pidValue' => $pidValue,
            'cidValue' => $cidValue,
            'ptypes' => $ptypes,
            'paymentos' => $paymentos,
        ]);

    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'eid' => 'string',
                'pid' => 'string',
                'mid' => 'string|unique:orders,mid',
                'cid' => 'string',
                'type' => 'string',
                'pt_type' => 'string',
                'price' => 'string',
                'payment' => 'string',
                'total' => 'string',
                'advance' => 'string',
                'due' => 'string',
                'billing_date' => 'nullable',
                'agreement' => 'nullable',
                'delivery' => 'nullable',
                'monthly_fee' => 'string',
            ]);


            $deliveryDate = optional(Carbon::parse($request->input('deliverydate')))->addDays(30);

            $order = Order::create([
                'eid' => $request->input('eid'),
                'pid' => $request->input('pid'),
                'mid' => $request->input('mid'),
                'cid' => $request->input('cid'),
                'total' => $request->input('total'),
                'advance' => $request->input('advance'),
                'due' => $request->input('due'),
                'type' => $request->input('type'),
                'pt_type' => $request->input('aid'),
                'price' => $request->input('price'),
                'payment' => $request->input('payment'),
                'billing_date' => $deliveryDate,
                'agreement' => $request->input('agreement'),
                'delivery' => $request->input('delivery'),
                'monthly_fee' => $request->input('monthly_fee'),
            ]);

            $paymento = Paymento::findOrFail($request->aid);
            $paymento->increment('balance', $request->payment);

            Statement::create([
                'aid' => $request->aid,
                'eid' => $request->eid,
                'cid' => $request->cid,
                'order' => $order->id,
                'paid' => $request->payment,
                'date' => now(),
                'balance' => $paymento->balance,
            ]);


            Session::flash('success', 'Order created successfully!');
            return back();

        }
        catch (ValidationException   $customErrors) {
            $customErrors = [
        'custom_field' => ['You already created an order.'],
         ];

        return back()
        ->withErrors(  $customErrors)
        ->withInput();
        }
    }
}