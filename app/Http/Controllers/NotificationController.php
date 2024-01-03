<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Employee;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function allnotification(){
        $notifications = Notification::all();
        return view('empnotifications.empnotification', compact('notifications'));
     }

    public function addempnotification(){
        $employees= Employee::all();
        return view('empnotifications.addempnotification', ['employees'=> $employees]);
     } 
    public function store(Request $request){
    $request->validate([
        'name' => 'required|string',
        'descriptions' => 'required|string',
    ]);

    Notification::create([
        'name' => $request->input('name'),
        'descriptions' => $request->input('descriptions'),
    ]);

    return redirect()->route('addempnotification');
    }

 
}