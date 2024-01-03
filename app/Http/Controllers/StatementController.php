<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Statement;


class StatementController extends Controller
{
  public function statement(){
    
        $statements = Statement::leftJoin('paymentos', 'paymentos.id', '=', 'statements.aid')
        ->leftjoin('mettings','mettings.id', '=','statements.cid')
        ->select('statements.*','paymentos.*','paymentos.name as namep','mettings.*','mettings.organization','mettings.name as namec','mettings.designaton','mettings.email')
        ->get();
       
        return view('statements.statement', ['statements'=>$statements]);
  }

  

}