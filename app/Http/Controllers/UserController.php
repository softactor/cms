<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class UserController extends Controller {
    
    
       public function __construct() {
        $this->middleware('auth');
    }

    
    public function create_users(Request $request){
     
            $url = [
                
                'url' => url('admin/store_user')
            ];
            
            $query = DB::table('roles')->get();
            $permision = DB::table('permision')->get();
        return view('backend.users.create_user', compact('url','query','permision')) ;
        
    }

    public function store_users(Request $request){
        
          $rules = [
            'name'      =>'required',
            'email'     =>'required|unique:users',
            'password'  =>'required',
            'role'      =>'required',
           
        ];
          
          $message = [
            'name.required' => 'Please enter the name field.',
            'email.required' => 'Please enter the email field.',
            'password.required' => 'Please enter the password field.',
            'role.required' => 'Please select the role field.',
            
              
        ];
          
         $validation = Validator::make($request->all(), $rules, $message);
           if ($validation->fails()) {
            return redirect('admin/create_user')
                            ->withErrors($validation)
                            ->with('error', 'Validation fail!')
                            ->withInput();
        }
          $password  = md5($request->password);
                  
        $insertData = [
            'name'      =>$request->name,
            'email'     =>$request->email,
            'role_id'    =>  Input::get('role'),
            'password'  =>$password,
            
            
        ];
     
 
          $insertResult = DB::table('users')->insert($insertData);
        return redirect('admin/create_user')
                        ->with('success', 'Data saved');
        
    }

    

    public function list_users() {
        $pageTitle = 'Users List';
        $pageData = [
            'pageTitle' => 'Users List',
            'formAction' => '',
            'redirecturl' => '',
            'getEditDayaUrl' => url('admin/get_User_list_data'),
            'viewUser' => url('admin/view_user'),
            'delUrl' => url('admin/delete_user_list_data'),
        ];
        $list = DB::table('users')->Join('roles', 'role_id', '=', 'roles.roles_id')->orderBy('id')->get();
      
        return View('backend.users.User', compact('list', 'pageData'));
    }

    public function get_User_list_data(Request $request) {
        // default param
        $status = 'error';
        $data = '';
        $message = 'No data found!';

        // get data from the table with row id
        $rowData = DB::table('users')->where('id', $request->row_id)->first();
        // check data is available or not
        if (isset($rowData) && !empty($rowData)) {
            $details_data = View::make('backend.partial.user_list', compact('rowData'));
            $status = 'success';
            $data = $details_data->render();
            $message = 'Data found!';
        }

        // 
        $feedbackData = [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($feedbackData);
    }

    public function update_user_list_data(Request $request) {
        $status = 'success';
        $data = '';
        $message = '';
        // check the duplicate value:

        $whereParam = [
            'name' => $request->name
        ];

        $checkResult = DB::table('users')->where($whereParam)->where('id', '!=', $request->user_id)->first();

        if (isset($checkResult) && !empty($checkResult)) {
            $status = 'duplicate_error';
            $message = 'Duplicate Data Found';
            $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
            exit;
        }

        $updarResult = DB::table('users')->where('id', $request->user_id)->update($whereParam);
        if ($updarResult) {
            $status = 'success';
            $message = 'data have been successfully updated.';
            $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];

            echo json_encode($feedbackData);
            exit;
        }
    }

    public function delete_user_data(Request $request) {
        $status = 'success';
        $data = '';
        $message = '';
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

    public function view_users(Request $request) {

        $status = 'error';
        $datas = '';
        $message = 'No data found!';
        $id= $request->id;
//  $data =DB::table('users')->where('id',$id)->first();
$data = DB::table('users')->Join('roles', 'role_id', '=', 'roles.roles_id')->where('id',$id)->first();
            
    //  $data =  DB::table('users')->where('id',$request->id)->first();
       // print_r($data);
        if (isset($datass) && !empty($datass)) {
            $details_data = View::make('cms.modal.viewUser', compact('data'));
            $status = 'success';
            $datas = $details_data->render();
            $message = 'Data found!';
        }
        $feedbackData = [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($feedbackData);
    }

}
