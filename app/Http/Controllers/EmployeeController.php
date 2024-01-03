<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attandance;
use App\Models\Epost;
use DB;


class EmployeeController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');

   }
   public function allemp()
   {
      // $employees = Employee::all();
      $employees = Employee::leftjoin('eposts', 'eposts.id', 'employees.position')->select('employees.*', 'eposts.name as postname') -> get();

      return view('employees.allemp',['employees' => $employees]);
   }

   public function addemp()
   {
      $eposts = Epost::all();
      return view('employees.addemp', ['eposts' => $eposts]);
   }


   public function empattendence()
   {
      $attandances = Attandance::all();
      return view('employees.empattendence')->with('attandances', $attandances);
   }

   public function store(Request $request)
   {

      $request->validate([
         'phone' => 'required|unique:employees',
         'email' => 'required|unique:employees',
         'eid' => 'required|string',
         'name' => 'nullable|string',
         'password' => 'nullable|string',
         'address' => 'nullable|string',
         'gender' => 'nullable|string',
         'position' => 'nullable|string',
         'join' => 'nullable|date',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      if ($request->hasFile('photo')) {
         $image = $request->file('photo');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $imagePath = 'employee_images/' . $imageName;

       
         Storage::putFileAs('public', $image, $imagePath);

         Employee::create([
            'eid' => $request->input('eid'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->password),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'home' => $request->input('home'),
            'join' => $request->input('join'),
            'position' => $request->input('position'),
            'status' => 1,
            'rating' => 0,
            'photo' => $imagePath,

         ]);

         return redirect()->route('addemp');
      }
   }
}