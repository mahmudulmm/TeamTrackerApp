<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Group;
use App\Models\Member;
use App\Models\Employee;
use App\Models\Epost;



class HostController extends Controller
{
    public function zone(){
        $zones = Zone::all();
        return view('host.zone', compact('zones'));
       }
         
    public function store(Request $request) {
        $request->validate([
            'name'=>'required|unique:zones',
        
        ]);
         Zone::create([
            'name'=>$request->name,
            'status'=>1
                
        ]);
           return redirect()->route('zone');
       }


       
    public function group(){
        $employees =Employee::where('position','=', '5')->get();
        $zones = Zone::all();
        $groups = Group::all();
        $employee = Employee::where('position', '=', '3') ->get();
        
        return view('host.group', [
            'zones' => $zones, 
            'groups'=>$groups,
             'employees' => $employees, 
            'employee'=>$employee,
    ]);
    }
         
    public function gstore(Request $request) {
       
        $request->validate([
            'name'=>'string',
           'zid' => 'required|string',
            'leader'=>'string',
            'team'=>'string',
            'status'=>'string',
            'note'=>'string',
            
        
        ]);
         Group::create([
            'name'=>$request->name,
            'zid' => $request->zid,
            'leader'=>$request->leader,
            'team'=>$request->team,
            'note'=>$request->note,
            'status'=>1
                
        ]);
           return redirect()->route('group');
       }

    public function member(){
        $employees =Employee::all();
        $employe =Employee::where('position','=', '5')->get();
        $employee = Employee::where('position', '=', '3') ->get();
        $groups = Group::all();
        $members = Member::leftJoin('groups', 'groups.id', '=', 'members.group')
        ->select('members.*','groups.name as nameg','groups.zid')
        ->get();

        return view('host.member', [
            'employees' => $employees, 
            'groups'=>$groups,
            'employee'=>$employee,
            'employe'=>$employe,
            'members'=>$members,
    ]);
       }
         
    public function mstore(Request $request) {
      
        $request->validate([
            'eid'=>'string',
            'group' => 'required|string',
            'leader' => 'required|string',
            'team' => 'required|string',
            
        ]);
         Member::create([
            'eid'=>$request->eid,
            'group' => $request->group,
            'leader' => $request->leader,
            'team' => $request->team,
                
        ]);
           return redirect()->route('member');
       }


         public function leader(){
            $employees =Employee
                    ::where('position','=', '5')
                    ->get();
        
       
        return view('host.leader', [
            'employees' => $employees, 
          
    ]);
       }
}