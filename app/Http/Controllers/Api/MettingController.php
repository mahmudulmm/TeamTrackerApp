<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;


class MettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['locationget']]);
        
    }

    public function metting_list() {
        $id=auth('api')->user()->id;

       $data= DB::table('metting_times')
       ->whereYear('metting_times.visit', now()->year)
        ->whereMonth('metting_times.visit', now()->month)
        ->leftjoin('mettinghosts','mettinghosts.mid','metting_times.mid')
        ->leftjoin('mettings','mettings.id','metting_times.mid')
        ->leftjoin('products','products.id','metting_times.pid')
        ->leftjoin('statuses','statuses.id','metting_times.status')
        ->leftjoin('groups','groups.id','metting_times.group')
        ->where('mettinghosts.eid',$id)
        ->select('metting_times.*','groups.name as group','products.name as pname','products.id as pid','products.time as delivery_time','mettings.*','metting_times.time as time','statuses.name as status','metting_times.id as id')
        ->orderBy('metting_times.id','desc')
        ->get();
        return response()->json($data, 200);
    }


    public function metting_save(Request $request){



        $lid=DB::table('locations')->insertGetId([
            'eid'=>auth('api')->user()->id, 
            'date'=>date('Y-m-d'), 
            'latitude'=>$request->latitude, 
            'longitude'=>$request->longitude, 
            'time'=>ate('H:i:s'), 
            'deviceid'=>'1221', 
            'status'=>1,
            'speed'=>0,
             'distance'=>0 , 
        ]);

        return $lid;

      $id=  DB::table('mettings')->insertGetId([
            'organization'=>$request->organization,
            'name'=>$request->name, 
            'address'=>$request->address, 
            'phone'=>$request->phone, 
            'email'=>$request->email, 
            'number'=>0
        ]);

        DB::table('metting_times')->insert([
            'host'=>auth('api')->user()->id,
            'mid'=>$id,
            'eid'=>auth('api')->user()->id,
            'visit'=>date('Y-m-d'),
            'time'=>date('H:i:s'),
            'pid'=>$request->product,
            'file'=>'none',
            'note'=>'no',
            'status'=>0,
            'in'=>$lid
            //'metting'=>0,
        ]);

        //mettinghosts
        DB::table('mettinghosts')->insert([
            'mid'=>$id,
            'eid'=>auth('api')->user()->id,
            'type'=>0,// here 0 main host . how host / lead the metting & other is 1 
        ]);

        return response()->json('ok', 200);

        
    }

    public function get_status() {
        $designation=DB::table('designations')->where('status',1)->get();

        $statuses=DB::table('statuses')->where('status',1)->get();
        $data=['designations'=>$designation,'statuses'=>$statuses];


        return response()->json($data, 200);
    }

    public function user_group() {
        $id= auth('api')->user()->id;
        $membergp =DB::table('employees')->where('id',$id)->first();

       

        


        switch ($membergp->position) {
            case 13:  # for Sector Leader
                
            // $checkgp= DB::table('groups')->where('leader',$membergp->id)->first();

            $groupmember=  DB::table('members')->where('members.leader',$id)
            ->leftjoin('employees','employees.id','members.eid')
            ->select('employees.id as id', 'employees.name as name')
            ->get();
    
            // $data=[];
    
           
    
            // foreach ($groupmember as  $key =>$value) {
               
            //     if ($value->id==$membergp->eid) {
            //         unset($groupmember[$key]);
            //     }else{
            //         $data[]=$value;
            //     }
            // }
    
            
    
            return response()->json($groupmember);
            
             break;
            
            case 12: #for Team Leader

            //$checkgp= DB::table('groups')->where('',$membergp->id)->first();

            $groupmember=  DB::table('members')->where('members.team',$id)
            ->leftjoin('employees','employees.id','members.eid')
            ->select('employees.id as id', 'employees.name as name')
            ->get();
    
            $data=[];
    
           
    
            foreach ($groupmember as  $key =>$value) {
               
                if ($value->id==$membergp->eid) {
                    unset($groupmember[$key]);
                }else{
                    $data[]=$value;
                }
            }
    
            
    
            return response()->json($data);
                break;
            case 11: # for Field 
            $checkgp= DB::table('members')->where('eid',$id)->first();

            $groupmember=  DB::table('members')->where('members.group',$checkgp->group)
            ->leftjoin('employees','employees.id','members.eid')
            ->select('employees.id as id', 'employees.name as name')
            ->get();
    
            $data=[];
            foreach ($groupmember as  $key =>$value) {
               
                if ($value->id==$membergp->eid) {
                    unset($groupmember[$key]);
                }else{
                    $data[]=$value;
                }
            }
    
            
    
            return response()->json($data);
                break;
        }

        
    }

    public function set_metting(Request $request)  {
        $id=auth('api')->user()->id;
        
        $check=DB::table('employees')->where('id',$id)->first();
        
       // $group=0;

       switch ($check->position) {
        case '13':
            $group=DB::table('members')->where('leader',$id)->first();
            break;
        
        case '12':
            $group=DB::table('members')->where('team',$id)->first();
            break;

        case '11':
            $group=DB::table('members')->where('eid',$id)->first();
             break;
       }

     

      

        $lid=  DB::table('locations')->insertGetID([
            'eid'=>auth('api')->user()->id,
            //'eid'=>120,
            'date'=>date('Y-m-d'),
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'time'=>date('H:i:s a'), 
            'deviceid'=>'1221', 
            'status'=>1,
            'speed'=>0,
            'distance'=>0 ,
        ]);

        $mid = DB::table('mettings')->insertGetId([
            'organization'=>$request->organization, 
            'name'=>$request->name, 
            'designaton'=>$request->designaton,
            'address'=>$request->address, 
            'phone'=>$request->phone, 
            'phone1'=>$request->phone1, 
            'email'=>$request->email, 
            'number'=>1
        ]);

        DB::table('metting_times')->insert([
            'host'=>$id, 
            'mid'=>$mid, 
            'eid'=>auth('api')->user()->id,
            'cid'=>$mid,
            'visit'=>date('Y-m-d'), 
            'pid'=>$request->product, 
            'time'=>date('H:i:s'), 
            'file'=>'no', 
            'note'=>$request->note, 
            'status'=>1, 
            'eedback'=>1,
            'duration'=>0,
            'in'=>$lid,
            'group'=>$group->group
        ]);

        DB::table('mettinghosts')->insert([
            'mid'=>$mid,
            'eid'=>auth('api')->user()->id,
            'type'=>0
        ]);

    
    

        $member = json_decode($request->coworker);

        if (!empty($member) ) {
            foreach ($member as  $value) {
                DB::table('mettinghosts')->insert([
                    'mid'=>$mid,
                    'eid'=>$value->id,
                    'type'=>1
                ]);
            }
        }
        

        
        return  response()->json('200');;
    }


    public function update_metting(Request $request){

        $startDate = Carbon::parse($request->oldtime);
        $endDate = Carbon::parse($request->time);

        $timeDifference = $startDate->diff($endDate);

        $h= $timeDifference->h;
        $m= $timeDifference->i;

        $lid=  DB::table('locations')->insertGetID([
            'eid'=>auth('api')->user()->id,
            //'eid'=>120,
            'date'=>date('Y-m-d'),
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'time'=>date('H:i:s a'), 
            'deviceid'=>'1221', 
            'status'=>1,
            'speed'=>0,
             'distance'=>0 ,
        ]);

        if ($request->feedback==1) {
            DB::table('metting_times')->where('id',$request->id)->update([
         
                'metting'=>ate('Y-m-d',strtotime($request->meeting)), 
                'duration'=>$h*60+$m, 
                //'status'=>$request->status,
                'out'=>$lid,
                'feedback'=>$request->feedback
            ]);
        }else{

            DB::table('metting_times')->where('id',$request->id)->update([
         
               // 'metting'=>\Carbon\Carbon::parse($request->time)->format('H:i:s'), 
                
                'duration'=>$h*60+$m, 
                'out'=>$lid,
                //'status'=>$request->status,
                'feedback'=>$request->feedback
            ]);

        }

        return response()->json($lid);

       
    }


    //product Related 
    public function products_list(){
        $products = DB::table('products')->where('status',1)->get();
        return response()->json($products);
    }


}
