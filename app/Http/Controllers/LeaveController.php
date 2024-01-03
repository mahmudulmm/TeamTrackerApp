<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;


class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function leave_apl(){

        $leaves= Leave::all();
        return view('leaves.leave_apl')->with('leaves',$leaves);
     }

     public function updateStatus(Request $request, Leave $leave)
     {
         $status = $request->input('status');
         $leave->update(['status' => $status]);
     
         return redirect()->back();
     }

}