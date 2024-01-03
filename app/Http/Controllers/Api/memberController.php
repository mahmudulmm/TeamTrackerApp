<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class memberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['locationget']]);
       // $this->user = auth('api')->user();
        
    }

    public function members_list() {
        $id=auth('api')->user()->id;
        $em= DB::table('employees')->where('id', $id)->first();

      

        switch ($em->position) {
            case 13: # SEctor Leader Or Leader
                    $group=DB::table('groups')->where('groups.leader',$id)
                    ->leftjoin('zones','zones.id','groups.zid')
                    ->select('groups.*','zones.name as zone')
                    ->get();

                    $members=[];

                    foreach ($group as $value) {
                        $data= DB::table('members')->where('members.group',$value->id)
                        ->leftjoin('employees','employees.id','members.eid')
                        ->leftjoin('eposts','eposts.code','employees.position')
                        ->select('members.id as mid','employees.eid as eid','employees.photo as photo','employees.name as name','employees.id as id','employees.phone as phone','employees.email as email','eposts.name as post')
                        ->get();
                        

                       foreach ($data as $key => $value1) {
                        $members[]=$value1;
                       }

                       $team= DB::table('employees')->where('employees.id',$value->team)
                    // ->leftjoin('employees','employees.id','members.eid')
                     ->leftjoin('eposts','eposts.code','employees.position')
                     ->select('employees.id as id','employees.eid as eid','employees.name as name','employees.photo as photo','employees.id as id','employees.phone as phone','employees.email as email','eposts.name as post')
                     ->first();

                    $members[]=$team;

                        

                    }

                    
                    return response()->json(['group'=>$group,'members'=>$members], 200);
                    
                    
                break;
            case 12: # Team Leader
            $group=DB::table('groups')->where('groups.team',$id)
            ->leftjoin('zones','zones.id','groups.zid')
            ->select('groups.*','zones.name as zone')
            ->get();

           
            $members=[];
          

            $data= DB::table('members')->where('members.group',$group->id)
            ->leftjoin('employees','employees.id','members.eid')
            ->leftjoin('eposts','eposts.code','employees.position')
            ->select('employees.id as id','employees.eid as eid','employees.name as name','employees.photo as photo','employees.id as id','employees.phone as phone','employees.email as email','eposts.name as post')
            ->get();

            $members=$data;

            $leader= DB::table('employees')->where('employees.id',$group->leader)
            // ->leftjoin('employees','employees.id','members.eid')
             ->leftjoin('eposts','eposts.code','employees.position')
             ->select('employees.id as id','employees.eid as eid','employees.name as name','employees.id as id','employees.photo as photo','employees.phone as phone','employees.email as email','eposts.name as post')
             ->first();

            $members[]=$leader;

            $innerArray = [
                'group'=>$group,
                'name' => $members];
            

           

            return response()->json($innerArray, 200);
            
                break;
            
            case 11: # Field 

            $findgroup=DB::table('members')->where('members.eid',$id)->first();

            $group=DB::table('groups')->where('groups.id',$findgroup->group)
            ->leftjoin('zones','zones.id','groups.zid')
            ->select('groups.*','zones.name as zone')
            ->first();



            $members=[];
          

            
            $data= DB::table('members')->where('members.group',$findgroup->group)
            ->leftjoin('employees','employees.id','members.eid')
            ->leftjoin('eposts','eposts.code','employees.position')
            ->select('employees.id as id','employees.eid as eid','employees.photo as photo','employees.name as name','employees.id as id','employees.phone as phone','employees.email as email','eposts.name as post')
            ->get();

            $members=$data;

            
            

            $team= DB::table('employees')->where('employees.id',$group->team)
           // ->leftjoin('employees','employees.id','members.eid')
            ->leftjoin('eposts','eposts.code','employees.position')
            ->select('employees.id as id','employees.eid as eid','employees.name as name','employees.id as id','employees.phone as phone','employees.photo as photo','employees.email as email','eposts.name as post')
            ->first();

            $leader= DB::table('employees')->where('employees.id',$group->leader)
           // ->leftjoin('employees','employees.id','members.eid')
            ->leftjoin('eposts','eposts.code','employees.position')
            ->select('employees.id as id','employees.eid as eid','employees.name as name','employees.id as id','employees.phone as phone','employees.photo as photo','employees.email as email','eposts.name as post')
            ->first();

            $members[]=$team;
            $members[]=$leader;



            return response()->json(['group'=>[$group],'members'=>$members], 200);
            break;
        }
       // return $em;
    }
}
