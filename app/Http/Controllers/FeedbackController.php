<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Model\cms\Complain_feedback;

class FeedbackController extends Controller {

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
    public function feedback_create() {
        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Create Feedback',
            'formAction' => url('admin/feedback_store'),
            'redirecturl' => url('admin/feedback_list'),
        ];
        return View('backend.Feedback.feedback_create', compact('pageData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function feedback_store(Request $request) {
        $rules = [
            'complian_type_id'  => 'required',
            'eng_feedbak'       => 'required',
            'customer_feedback' => 'required'
        ];

        $message = [
            'complian_type_id.required' => 'Please enter the Complain Type Id Name field.',
            'eng_feedbak.required' => 'Please enter the Engineer Name  field.',
            'customer_feedback.required' => 'Please enter the Customer Feedback Deatils field.'
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        // Check the validation 
        if ($validation->fails()) {
            return redirect('admin/feedback_create')
                            ->withErrors($validation)
                            ->with('error', 'Validation fail!')
                            ->withInput();
        }
        
        $Complain_feedback  =   new Complain_feedback;
        $Complain_feedback->complian_type_id      = $request->complian_type_id;
        $Complain_feedback->eng_feedbak      = $request->eng_feedbak;
        $Complain_feedback->customer_feedback      = $request->customer_feedback;
        $Complain_feedback->save();
        return redirect('admin/feedback_create')
                        ->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedback_list() {

        $pageTitle = '';
        $pageData = [
            'pageTitle'     => 'Feedback List',
            'delUrl'        => url('admin/feedback_delete'),
            'redirecturl'   => ''
        ];
        $list = Complain_feedback::get();
        return View('backend.Feedback.list', compact('list', 'pageData'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedback_edit($id) {
        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Feedback Edit',
            'formAction' => url('admin/feedback_update'),
            'redirecturl' => url('admin/feedback_list'),
        ];
        $editData   =   DB::table('complain_feedback')->where('id', $id)->first();
        return View('backend.Feedback.edit', compact('editData', 'pageData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedback_update(Request $request) {
        $all    =   $request->all();
        $where  =   [
            'id'=>$request->update_id
        ];
        $updateData =   [
            'complian_type_id'  =>$request->complian_type_id,
            'eng_feedbak'       =>$request->eng_feedbak,
            'customer_feedback' =>$request->customer_feedback
        ];
        
        DB::table('complain_feedback')->where($where)->update($updateData);
        return redirect('admin/feedback_list')
                        ->with('success', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedback_delete(Request $request) {
        $status = 'success';
        $data = '';
        $message = '';
        $deleteResult = DB::table('complain_feedback')->where('id', $request->id)->delete();
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
