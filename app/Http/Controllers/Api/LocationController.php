<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['locationget','getallLocation']]);
    }
    //locationget

    public function locationget() {
        return 'ok';
    }

    public function locationsave(Request $request) {
        DB::table('locations')->insert([
            'eid'=>auth('api')->user()->id,
            //'eid'=>120,
            'date'=>date('Y-m-d'),
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'status'=>$request->speed
        ]);

        return response()->json('ok', 200 );
        //return auth('api')->user()->id;
    }

    public function getallLocation()  {
        $data=DB::table('locations')->get();
          return response()->json($data, 200 );
    }
}
