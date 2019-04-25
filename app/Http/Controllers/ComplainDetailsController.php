<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
            'pageTitle' => 'Create Feedback',
            'formAction' => url('admin/complain_details_store'),
            'redirecturl' => url('admin/complain_details_list'),
        ];
        return View('backend.ComplainDetails.create', compact('pageData'));
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
            'complain_type_id' => 'required',
            'complain_details' => 'required',
            'compalin_status' => 'required',
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

        $insertData = [
        'user_id' => $request->user_id,
        'complain_type_id' => $request->complain_type_id,
        'complain_details' => $request->complain_details,
        'compalin_status' => $request->compalin_status,
        'issued_date' => $request->issued_date
        ];
        $insertResult = DB::table('complain_details')->insert($insertData);
        return redirect('admin/complain_details_create')
                        ->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complain_details_list() {

        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Departments List',
            'formAction' => '',
            'redirecturl' => ''
        ];
        $list = DB::table('complain_details')->get();
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
    public function destroy($id) {
        //
    }

}
