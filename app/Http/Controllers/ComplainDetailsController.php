<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon;

class ComplainDetailsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complain_details_create() {
        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Create Complain',
            'formAction' => url('admin/complain_details_store'),
            'redirecturl' => url('admin/complain_details_list'),
        ];
        
      $list=  DB::table('complain_type')->get();
      $id = \Auth::user()->id;
        return View('backend.ComplainDetails.create', compact('pageData','list','id'));
    }
    public function complain_create() {
        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Create Complain',
            'formAction' => url('admin/complain_details_store'),
            'redirecturl' => url('admin/complain_details_list'),
        ];
        
      $list=  DB::table('complain_type')->get();
      $id = \Auth::user()->id;
        return View('backend.ComplainDetails.create', compact('pageData','list','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complain_details_store(Request $request) {
        $rules = [
            'user_id' => 'required',
//            'complain_type_id' => 'required',
            'complain_details' => 'required',
//            'compalin_status' => 'required',
            'issued_date' => 'required'
        ];

        $message = [
            'user_id.required' => 'Please enter the User Id Name field.',
            'complain_type_id.required' => 'Please enter the Complain type id field.',
            'complain_details.required' => 'Please enter the Complain Deatils field.',
            'compalin_status.required' => 'Please enter the Complain Status field.',
            'issued_date.required' => 'Please enter the issued Date field.'
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        // Check the validation 
        if ($validation->fails()) {
            return redirect('admin/complain_details_create')
                            ->withErrors($validation)
                            ->with('error', 'Validation fail!')
                            ->withInput();
        }

        // check the duplicate value:

        $whereParam = [
            'user_id' => $request->complian_id,
            'complain_type_id' => $request->complain_type_id
                
        ];

        $checkResult = DB::table('complain_details')->where($whereParam)->first();

        if (isset($checkResult) && !empty($checkResult)) {
            return redirect('admin/complain_details_create')
                            ->with('error', 'Duplicate Data Found')
                            ->withInput();
        }
       $id = \Auth::user()->id;
 $datetime = \Faker\Provider\DateTime::dateTime();
        $insertData = [
        'user_id' => $id,
        'complain_type_id' => Input::get('type'),
        'complain_details' => $request->complain_details,
        'complain_status' => 'new',
        'issued_date' => Input::get('issued_date')
        ];
        $insertResult = DB::table('complain_details')->insert($insertData);
        return redirect('admin/complain_details_create')
                        ->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responses
     */
    public function complain_details_list() {

        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Complain List',
            'formAction' => '',
            'redirecturl' => ''
        ];
        $list =DB::table('complain_details')
            ->Join('users', 'user_id', '=', 'users.id')
            ->Join('complain_type','complain_type_id','=','complain_type.id')
            ->get();  
        
        

        return View('backend.ComplainDetails.list', compact('list', 'pageData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_enginner_info(Request $request) {
        $id = $request->id;
          $list = DB::table('users')->where('id',$id)->get();
       return $list;
    }
    
    
    public function viewComplains(Request $request){
        
         $id= $request->id;
         $list =DB::table('complain_details') 
                  ->Join('users', 'user_id', '=', 'users.id')
            ->Join('complain_type','complain_type_id','=','complain_type.type_id')           
      ->where('complain_details.details_id',$id)
            ->get();  
    echo json_encode($list) ;
    } 
    
    
    public function assign_complain(Request $request){
       // $todayDate = date("Y-m-d");
     $assignDate = date("Y-m-d", strtotime($request->dead_line));
        
       // $days = $todayDate->diffInDays(Carbon\Carbon::parse($assignDate), true);
         $status = 'success';
         $data = '';
         $message = '';
         
     
        
         $val = [
            'select' => 'required',
            
            
        ];
         $message = [
            'select.required' => 'Please select enginner.',    
        ];
         
          $validation = Validator::make($request->all(), $val, $message);
               if ($validation->fails()) {
            return redirect('admin/complain_details_create')
                            ->withErrors($validation)
                            ->with('error', 'Validation fail!')
                            ->withInput();
        }
          
          $insertData = [
              'user_id'=>$request->select,
              'complain_id' => $request->complain_id,
              'status'   => 'processing',
              'sort_type' => 'new',
              'dead_line' => $assignDate
          ];
          $insertResult = DB::table('assigned')->insert($insertData);  
          
          if($insertResult){
//            
              $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];
         
          }
          
    }
    
    public function update_complain(Request $request) {
        
           $status = 'success';
         $data = '';
         $message = '';
         
         $param = [
          'complain_status' => 'pending' ,
        ];
       
        $insertResult = DB::table('complain_details')->where('details_id',$request->id)->update($param);  
            if($insertResult){
//            
              $feedbackData = [
                'status' => $status,
                'data' => $data,
                'message' => $message
            ];
             // echo json_encode($feedbackData);
          }
          
    }
    
    
    public function delete_complain_data(Request $request) {
             $status = 'success';
        $data = '';
        $message = '';
        $deleteResult = DB::table('complain_details')->where('details_id', $request->details_id)->delete();
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
