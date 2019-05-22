<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Department;

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
            'complian_id' => 'required',
            'eng_feedbak' => 'required',
            'customer_feedback' => 'required'
        ];

        $message = [
            'complian_id.required' => 'Please enter the Complain Id Name field.',
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

        // check the duplicate value:

        $whereParam = [
            'complian_id' => $request->complian_id
        ];

        $checkResult = DB::table('complain_feedback')->where($whereParam)->first();

        if (isset($checkResult) && !empty($checkResult)) {
            return redirect('admin/feedback_create')
                            ->with('error', 'Duplicate Data Found')
                            ->withInput();
        }

        $insertData = [
        'complian_id'           => $request->complian_id,
        'eng_feedbak'           => $request->eng_feedbak,
        'customer_feedback'     => $request->customer_feedback
        ];
        $insertResult = DB::table('complain_feedback')->insert($insertData);
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
            'pageTitle' => 'Departments List',
            'formAction' => '',
            'redirecturl' => ''
        ];
        $list = DB::table('complain_feedback')->get();
        return View('backend.Feedback.list', compact('list', 'pageData'));
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
    public function destroy($id) {
        //
    }

}
