<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{


    public function list_users(){
        $pageTitle  =   'Users List';
        $pageData   =   [
            'pageTitle'     => 'Users List',
            'formAction'    => '',
            'redirecturl'   => '',
            'getEditDayaUrl'=> url('admin/get_User_list_data'),
            'delUrl'=> url('admin/delete_user_list_data'),
        ];
        $list   =   DB::table('users')->get();
        return View('backend.users.User', compact('list', 'pageData'));
    }

    public function get_User_list_data(Request $request){
        // default param
        $status     =   'error';
        $data       =   '';
        $message    =   'No data found!';
        
        // get data from the table with row id
        $rowData    =   DB::table('users')->where('id', $request->row_id)->first();
        // check data is available or not
        if(isset($rowData) && !empty($rowData)){
            $details_data   =   View::make('backend.partial.user_list', compact('rowData'));
            $status         =   'success';
            $data           =   $details_data->render();
            $message        =   'Data found!';
        }
        
        // 
        $feedbackData   =   [
            'status'  => $status,
            'data'    => $data,
            'message' => $message
        ];
        
        echo json_encode($feedbackData);
    }
    
    public function update_user_list_data(Request $request){
        $status     =   'success';
        $data       =   '';
        $message    =   '';
        // check the duplicate value:
        
        $whereParam  =   [
            'name'  =>  $request->name
        ];
        
        $checkResult    =   DB::table('users')->where($whereParam)->where('id', '!=', $request->user_id)->first();
        
        if(isset($checkResult) && !empty($checkResult)){
            $status     =   'duplicate_error';
            $message    =   'Duplicate Data Found';
            $feedbackData   =   [
                'status'  => $status,
                'data'    => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
            exit;
        }  
        
        $updarResult    =   DB::table('users')->where('id', $request->user_id)->update($whereParam);
        if($updarResult){
            $status     =   'success';
            $message    =   'data have been successfully updated.';
            $feedbackData   =   [
                'status'  => $status,
                'data'    => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
            exit;
        }
        
    }
    public function delete_user_list_data(Request $request) {
        $status     =   'success';
        $data       =   '';
        $message    =   '';
        $deleteResult = DB::table('users')->where('id', $request->id)->delete();
        if ($deleteResult) {
            $status = 'success';
            $message = 'data have been successfully deleted.';
            $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
        }
    }





}