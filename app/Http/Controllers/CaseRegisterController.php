<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseRegisterController extends Controller
{
    public function allmeeting(Request $request)
    {
        if($request->get('from')||$request->get('to')||$request->get('district')){
            $cases = $this->case->searchCases($request->all());
          
                   return view('meeting.allmeeting',compact('cases'));

       }

        $cases = $this->case->allCases();
        return view('meeting.allmeeting',compact('cases'));
    }
}
