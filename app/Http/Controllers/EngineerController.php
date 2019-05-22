<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class EngineerController extends Controller
{
    public function index() {
        $id = \Auth::user()->id;
        $data= Db::table('assigned')
                ->Join('users', 'user_id', '=', 'users.id')
                 ->Join('complain_details', 'complain_id', '=', 'complain_details.details_id')
                ->Join('complain_type', 'complain_details.complain_type_id', '=', 'complain_type.type_id')->where('sort_type','=','new')
                ->where('assigned.user_id',$id)
                ->where('assigned.status','=','processing')
                ->get();
        $dataAccepted= Db::table('assigned')
                ->Join('users', 'user_id', '=', 'users.id')
                 ->Join('complain_details', 'complain_id', '=', 'complain_details.details_id')
                ->Join('complain_type', 'complain_details.complain_type_id', '=', 'complain_type.type_id')->where('sort_type','=','new')
                ->where('assigned.user_id',$id)
                ->where('assigned.status','=','accepted')
                ->get();
//echo json_encode($data);
return view('backend.engineer.dashboard', compact('data','dataAccepted'));
        
    }
    
    public function Accepted_Button(Request $request){
           $status = 'success';
        $data = '';
        $message = '';
    
       $param = [
          'status' => 'accepted' ,
        ];
        $id = $request->id;
       $updarResult = DB::table('assigned')->where('assing_id', $id)->update($param);
         if ($updarResult) {
            $status = 'success';
            $message = 'data have been successfully updated.';
            $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
      
    }
    
    
   

}
public function updateComplainStatus() {
        
    }



}
