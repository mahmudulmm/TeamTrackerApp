<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    
    public function holiday()
{
    $holidays = Holiday::all();
    return view('holidays.holiday', compact('holidays'));
}
   
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
    ]);

    Holiday::create([
        'name' => $request->input('name'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
    ]);

    return redirect()->route('holidays.holiday');
}
}