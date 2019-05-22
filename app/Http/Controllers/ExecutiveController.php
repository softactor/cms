<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class ExecutiveController extends Controller
{
    public function list_complains(){
          $list =DB::table('complain_details')
            ->Join('users', 'user_id', '=', 'users.id')
            ->Join('complain_type','complain_type_id','=','complain_type.type_id')
                  ->where('complain_status','=','new')->orderBy('details_id')
                  ->get();
          
       
        
             $pending =DB::table('complain_details')
            ->Join('users', 'user_id', '=', 'users.id')
            ->Join('complain_type','complain_type_id','=','complain_type.type_id')
                  ->where('complain_status','=','pending')->orderBy('details_id')
                  ->get();
               $dataAccepted= Db::table('assigned')
                ->Join('users', 'user_id', '=', 'users.id')
                 ->Join('complain_details', 'complain_id', '=', 'complain_details.details_id')
                ->Join('complain_type', 'complain_details.complain_type_id', '=', 'complain_type.type_id')->where('sort_type','=','new')
             
                ->where('assigned.status','=','accepted')
                ->get();
       
        
        return view('executive.complains', compact('list','pending','dataAccepted'));
    }
   
}
