<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function elocationsmap(){
        $locations= Location::all();
        return view('elocations.elocationsmap')->with('locations',$locations);
     }
}