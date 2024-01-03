<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metting;
use App\Models\Metting_time;
use App\Models\Mettinghost;
use App\Models\Products;
use DB;

class MeetingController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function allmeeting(){
       $mettings = Metting::all();
       return view('meeting.allmeeting')->with('mettings',$mettings);
    }
    public function tometting(){
        $metting_times = Metting_time::all();
        return view('meeting.tometting')->with('metting_times',$metting_times );
     }

     public function mestatus(){
       $mettstatus = DB::table('metting_times')
                ->where('status', '=', '1')
                ->get();
      return view('meeting.mestatus',compact('mettstatus'));
   }


}