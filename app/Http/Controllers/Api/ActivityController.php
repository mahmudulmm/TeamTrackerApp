<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['locationget']]);
       // $this->user = auth('api')->user();
        
    }

    public function checkin(Request $request){

        $id= auth('api')->user()->id;

        $lid=DB::table('locations')->insertGetId([
            'eid'=>$id, 
            'date'=>date('Y-m-d'), 
            'latitude'=>$request->latitude, 
            'longitude'=>$request->longitude, 
            'time'=>$request->time, 
            'deviceid'=>'1221', 
            'status'=>1,
            'speed'=>0,
             'distance'=>0 , 
        ]);

      $aid=  DB::table('attandances')->insertGetId([
            'eid'=>$id, 
            'date'=>date('Y-m-d'), 
            'in'=>$request->time, 
            'out'=>0, 
            'lin'=>$lid, 
            'lout'=>0,
        ]);

        // return  response()->json(['id'=>$aid]);
        return  response()->json($aid);

    }

    public function checkout(Request $request){

        $id= auth('api')->user()->id;

        $lid=DB::table('locations')->insertGetID([
            'eid'=>$id, 
            'date'=>date('Y-m-d'), 
            'latitude'=>$request->latitude, 
            'longitude'=>$request->longitude, 
            'time'=>$request->time, 
            'deviceid'=>'1221', 
            'status'=>1,
            'speed'=>0,
            'distance'=>0 , 
        ]);

        DB::table('attandances')->where('id',$request->aid)->update([
           
            'out'=>$request->time,  
            'lout'=>$lid,
        ]);

        return  response()->json($request->aid);

    }
}
