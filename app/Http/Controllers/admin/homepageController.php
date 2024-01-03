<?php

namespace App\Http\Controllers\admin;
//namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Storage;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }

    public function  homepage() {
        
        return view('dashboard');

        //return view('panel.homepage.index',['user'=>$datum]);
    }

    public function profile(){
        $id= Auth::guard('admin')->user()->id;
        $datum=DB::table('users')->where('id',$id)->first();
        $users=DB::table('users')->where('id','!=',$id)->get();
        
        return view('dashboard.homepage.home',['user'=>$datum,'users'=>$users]);
    }

    public function employeeList(){
        $users=DB::table('employees')
        ->leftjoin('posts','posts.code','employees.position')
        ->leftjoin('statuses','statuses.id','employees.status')
        ->select('employees.*','posts.name as position','statuses.name as status')
        ->get();

       
        return view('panel.employee.list',['data'=>$users]);
    }


    public function emDetails($id)  {
        $user=DB::table('employees')->where('employees.id',$id)
        ->leftjoin('posts','posts.id','employees.position')
        ->leftjoin('statuses','statuses.id','employees.status')
        ->select('employees.*','posts.name as position','statuses.name as status')
        ->first();

        $posts=DB::table('posts')->where('status',1)->get();

        return view('panel.employee.details',['datum'=>$user,'posts'=>$posts]);
    }

    public function assign_post()  {
        
    }

    public function employeeAdd(){
        $post = DB::table('posts')->where('status',1)->get();
        return view('panel.employee.add',['posts'=>$post]);
    }

    public function employeeEdit($id) {
        $user=DB::table('employees')->where('employees.id',$id)
        ->leftjoin('posts','posts.id','employees.position')
        ->leftjoin('statuses','statuses.id','employees.status')
        ->select('employees.*','posts.name as position','statuses.name as status')
        ->first();
        $posts=DB::table('posts')->get();
        return view('panel.employee.edit',['datum'=>$user,'posts'=>$posts]);
    }

    public function employeeStore(Request $request) {
        $request->validate( [
            'phone'=>'required|unique:employees',
            'email'=>'required|unique:employees'
            ]);

         //   return $request;

        $imageurl='public/employee/noimage.jpg';

        if($image1 =$request->file('image')){
            $image = $request->file('image');
      
          $imagename = time().'_'.$request->file('image')->getClientOriginalName();
          $destinationPath = public_path('/employee');
          $image->move($destinationPath, $imagename);
          $url='public/employee/'.$imagename;
        }

        DB::table('employees')->insert([
            'eid'=>$request->eid,
            'name'=>$request->name, 
            'email'=>$request->email, 
            'phone'=>$request->phone, 
            'password'=>Hash::make($request->password),
            'address'=>$request->address, 
            //'gender'=>$request->gender, 
            'photo'=>$imageurl, 
            'gender'=>$request->gender,
            'home'=>'no',
            'join'=>$request->date, 
            'position'=>$request->position,
            'status'=>1, 
            'rating'=>0
            
        ]);
        return redirect()->route('list-employee')->with('success','Employee Add Successfully');
    }

    public function employeeUpdate(Request $request)  {
       

        if($image1 =$request->file('image')){
            $image = $request->file('image');
      
          $imagename = time().'_'.$request->file('image')->getClientOriginalName();
          $destinationPath = public_path('/employee');
          $image->move($destinationPath, $imagename);
          $url='public/employee/'.$imagename;
          
          Storage::delete($request->oldimage);
          DB::table('employees')->where('id',$request->id)->update([
            'photo'=>$url
          ]);
        }

        DB::table('employees')->where('id',$request->id)->update([
            'name'=>$request->name, 
            'email'=>$request->email, 
            'phone'=>$request->phone, 
           
            'address'=>$request->address, 
            'eid'=>$request->eid, 
           
            'gender'=>$request->gender,
           
            'join'=>$request->date, 
            'position'=>$request->position
            
            
        ]);
        return redirect()->route('list-employee')->with('success','Employee Add Successfully');
    
    }


    //post

    public function  post_list()  {
        $data=DB::table('posts')->get();
        return view('panel.employee.post',['data'=>$data]);
    }

    public function post_save(Request $request) {
        $request->validate([
            'name'=>'required|unique:posts',
            'code'=>'required|unique:posts',
        ],
        [
            'danger' => 'You have to choose the file!',
            
        ]);
        DB::table('posts')->insert([
            'name'=>$request->name,
            'salary'=>$request->salary,
            'code'=>$request->code,
            'status'=>1
        ]);
        return  redirect()->back()->with('success',__('message.success'));
    }

    public function post_update(Request $request)  {
        DB::table('posts')->where('id',$request->id)->update([
            'name'=>$request->name,
            'salary'=>$request->salary,
            //'code'=>$request->code,
            'status'=>$request->status
        ]);

        return  redirect()->back()->with('success',__('message.success'));
    }

    public function post_delete($id)  {
        DB::table('posts')->where('id',$id)->delete();
        return  redirect()->back()->with('danger',__('message.post_delete'));
    }
}
