<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ComplainTypeController extends Controller{
    
    public function create(){
        $pageTitle  =   'Create Complain type';
        $pageData   =   [
            'pageTitle'     => 'Create Complain type',
            'formAction'    => url('admin/store_complain_type'),
            'redirecturl'   => url('admin/complain_type_list'),
        ];
        return View('backend.complain_type.create', compact('pageData'));
    }
    
    public function store_complain_type(Request $request){
        $rules          =   [
            'name' => 'required',
        ];
        
        $message    =   [
            'name.required' => 'Please enter the name field.'
        ];
        
        $validation     =   Validator::make($request->all(), $rules, $message);
        // Check the validation 
        if ($validation->fails()) {
            return redirect('admin/create_complain_type')
                        ->withErrors($validation)
                        ->with('error', 'Validation fail!')
                        ->withInput();
        }
        
        // check the duplicate value:
        
        $whereParam  =   [
            'name'  =>  $request->name
        ];
        
        $checkResult    =   DB::table('complain_type')->where($whereParam)->first();
        
        if(isset($checkResult) && !empty($checkResult)){
            return redirect('admin/create_complain_type')
                        ->with('error', 'Duplicate Data Found')
                        ->withInput();
        }
        
        $insertData     =   [
            'name'  =>  $request->name
        ];
        $insertResult   =   DB::table('complain_type')->insert($insertData);
        return redirect('admin/create_complain_type')
                        ->with('success', 'Data saved');
    }
    
    public function complain_list(){
        $pageTitle  =   'Create Complain type';
        $pageData   =   [
            'pageTitle'     => 'Complain type List',
            'formAction'    => '',
            'redirecturl'   => '',
            'getEditDayaUrl'=> url('admin/get_complain_type_edit_data'),
            'delUrl'=> url('admin/delete_complain_type_data'),
        ];
        $list   =   DB::table('complain_type')->get();
        return View('backend.complain_type.list', compact('list', 'pageData'));
    }
    
    public function get_complain_type_edit_data(Request $request){
        // default param
        $status     =   'error';
        $data       =   '';
        $message    =   'No data found!';
        
        // get data from the table with row id
        $rowData    =   DB::table('complain_type')->where('id', $request->row_id)->first();
        // check data is available or not
        if(isset($rowData) && !empty($rowData)){
            $details_data   =   View::make('backend.partial.complain_type_edit_data', compact('rowData'));
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
    
    public function update_complain_type_data(Request $request){
        $status     =   'success';
        $data       =   '';
        $message    =   '';
        // check the duplicate value:
        
        $whereParam  =   [
            'name'  =>  $request->name
        ];
        
        $checkResult    =   DB::table('complain_type')->where($whereParam)->where('id', '!=', $request->complain_type_id)->first();
        
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
        
        $updarResult    =   DB::table('complain_type')->where('id', $request->complain_type_id)->update($whereParam);
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
    public function delete_complain_type_data(Request $request) {
        $status     =   'success';
        $data       =   '';
        $message    =   '';
        $deleteResult = DB::table('complain_type')->where('id', $request->id)->delete();
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
