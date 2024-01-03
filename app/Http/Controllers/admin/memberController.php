<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Storage;


class memberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }

    public function  zone_list()  {
        $data=DB::table('zones')->get();
        return view('panel.employee.zone',['data'=>$data]);
    }

    public function zone_save(Request $request) {
        $request->validate([
            'name'=>'required|unique:zones',
           // 'code'=>'required|unique:posts',
        ],
        [
            'danger' => 'You have to choose the file!',
            
        ]);
        DB::table('zones')->insert([
            'name'=>$request->name,
            
            'status'=>1
        ]);
        return  redirect()->back()->with('success',__('message.success'));
    }

    public function zone_update(Request $request)  {
        DB::table('zones')->where('id',$request->id)->update([
            'name'=>$request->name,
            //'salary'=>$request->salary,
            //'code'=>$request->code,
            'status'=>$request->status
        ]);

        return  redirect()->back()->with('success',__('message.success'));
    }

    public function zone_delete($id)  {
        DB::table('zones')->where('id',$id)->delete();
        return  redirect()->back()->with('danger',__('message.zone_delete'));
    }


    public function  group_list()  {
        $data=[];
        $groups=DB::table('groups')
        ->leftjoin('zones','zones.id','groups.zid')
        ->select('groups.*','zones.name as zone')
        ->get();
        

        foreach ($groups as  $value) {
            $innerArray = [
                'id'=>$value->id,
                'name' => $value->name,
                'zone'=>$value->zone,
                'zid'=>$value->zid,
                'leader'=>DB::table('employees')->where('id',$value->leader)->first()->name,
                'lid'=>$value->leader,
                'team'=>DB::table('employees')->where('id',$value->team)->first()->name,
                'tid'=>$value->team,
                'status'=>$value->status,
                'member'=>DB::table('members')->where('group',$value->id)->count()
            ];

            $data[] = $innerArray;
        }
       // return $data;

        $zone=DB::table('zones')->where('status',1)->get();
        $leader=DB::table('posts')->where('posts.code',13)
        ->leftjoin('employees','employees.position','posts.code')
        ->select('employees.id as id','employees.name as name','posts.code as code')
        ->get();

        $teamleader=DB::table('posts')->where('posts.code',12)
        ->leftjoin('employees','employees.position','posts.code')
        ->select('employees.id as id','employees.name as name','posts.code as code')
        ->get();

        //return $teamleader;

        
        return view('panel.employee.group',['data'=>$data,'zones'=>$zone,'leader'=>$leader,'team'=>$teamleader]);
    }

    public function group_save(Request $request) {
        $request->validate([
            'name'=>'required|unique:groups',
           // 'code'=>'required|unique:groups',
        ],
        [
            'danger' => 'You have to choose the file!',
            
        ]);
        DB::table('groups')->insert([
            'name'=>$request->name,
            'zid'=>$request->zone,
            'leader'=>$request->leader,
            'team'=>$request->team,
            'status'=>1,
            'note'=>'ok'
            
        ]);
        return  redirect()->back()->with('success',__('message.success'));
    }

    public function group_update(Request $request)  {
        DB::table('groups')->where('id',$request->id)->update([
            'name'=>$request->name,
            'zid'=>$request->zone,
            'leader'=>$request->leader,
            'team'=>$request->team,
            'status'=>$request->status
        ]);

        return  redirect()->back()->with('success',__('message.success'));
    }

    public function group_delete($id)  {
        DB::table('groups')->where('id',$id)->delete();
        DB::table('members')->where('group',$id)->delete();
        return  redirect()->back()->with('danger',__('message.post_delete'));
    }


    //member

    public function group_details($id) {
        $data= DB::table('members')->where('members.group',$id)
        ->leftjoin('employees','employees.id','members.eid')
        ->leftjoin('posts','posts.code','employees.position')
        ->select('members.id as mid','employees.eid as eid','employees.name as name','employees.id as id','employees.phone as phone','employees.email as email','posts.name as post')
        ->get();
        
        $group=DB::table('groups')->where('groups.id',$id)
        ->leftjoin('zones','zones.id','groups.zid')
        ->select('groups.*','zones.name as zone')
        ->first();

        //$employee= DB::table('employees')->where('employees.position',11)->where('id','!=',DB::table('members')->first()->eid)->select('employees.id as id','employees.name as name')->get();

        $employee= DB::table('employees')->where('employees.position',11)->select('employees.id as id','employees.name as name')->get();

        foreach ($employee as  $key =>$value) {
            $check= DB::table('members')->where('eid',$value->id)->exists();
            if ($check  ) {
                unset($employee[$key]);
            }
        }
        // ->leftjoin('employees','employees.id','!=' ,'members.eid')
        // ->where('employees.position',11)
        // //->where('id','!=',DB::table('members')->first()->eid)
        // ->select('employees.id as id','employees.name as name')->get();

       // return $employee;
        return view('panel.employee.members',['data'=>$data, 'group'=>$group,'employees'=>$employee]);
    }

    // public function  member_list()  {
    //     $data=[];
    //     $groups=DB::table('groups')
    //     ->leftjoin('zones','zones.id','groups.zid')
    //     ->select('groups.*','zones.name as zone')
    //     ->get();

    //     foreach ($groups as  $value) {
    //         $innerArray = [
    //             'id'=>$value->id,
    //             'name' => $value->name,
    //             'zone'=>$value->zone,
    //             'zid'=>$value->zid,
    //             'leader'=>DB::table('employees')->where('id',$value->leader)->first()->name,
    //             'lid'=>$value->leader,
    //             'team'=>DB::table('employees')->where('id',$value->team)->first()->name,
    //             'tid'=>$value->team,
    //             'status'=>$value->status
    //         ];

    //         $data[] = $innerArray;
    //     }
    //    // return $data;

    //     $zone=DB::table('zones')->where('status',1)->get();
    //     $leader=DB::table('posts')->where('posts.code',13)
    //     ->leftjoin('employees','employees.position','posts.code')
    //     ->select('employees.id as id','employees.name as name','posts.code as code')
    //     ->get();

    //     $teamleader=DB::table('posts')->where('posts.code',12)
    //     ->leftjoin('employees','employees.position','posts.code')
    //     ->select('employees.id as id','employees.name as name','posts.code as code')
    //     ->get();

    //     //return $teamleader;
    //     return view('panel.employee.group',['data'=>$data,'zones'=>$zone,'leader'=>$leader,'team'=>$teamleader]);
    // }

    public function member_save(Request $request) {
        $gp=DB::table('groups')->where('id',$request->gid)->first();
        
        DB::table('members')->insert([
           
            'eid'=>$request->eid,
            'group'=>$request->gid,
            'leader'=>$gp->leader,
            'team'=>$gp->team
           
        ]);
        return  redirect()->back()->with('success',__('message.success'));
    }

    public function member_update(Request $request)  {
        DB::table('groups')->where('id',$request->id)->update([
            'name'=>$request->name,
            'zid'=>$request->zone,
            'leader'=>$request->leader,
            'team'=>$request->team,
            'status'=>$request->status
        ]);

        return  redirect()->back()->with('success',__('message.success'));
    }

    public function member_delete($id)  {
        DB::table('members')->where('id',$id)->delete();
        return  redirect()->back()->with('danger',__('message.delete'));
    }
}
