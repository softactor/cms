<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller {

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
    public function department_create() {
        $pageTitle = 'Create Departement';
        $pageData = [
            'pageTitle' => 'Create Departement',
            'formAction' => url('admin/department_store'),
            'redirecturl' => url('admin/department_list'),
        ];
        return View('backend.Departements.create', compact('pageData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function department_store(Request $request) {
        $rules = [
            'dep_name'      => 'required',
            'dep_details'   => 'required'
        ];

        $message = [
            'dep_name.required' => 'Please enter the Departement Name field.',
            'dep_details.required' => 'Please enter the Departement Deatils field.'
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        // Check the validation 
        if ($validation->fails()) {
            return redirect('admin/department_create')
                            ->withErrors($validation)
                            ->with('error', 'Validation fail!')
                            ->withInput();
        }

        // check the duplicate value:

        $whereParam = [
            'dep_name'     => $request->dep_name
        ];

        $checkResult = DB::table('departments')->where($whereParam)->first();

        if (isset($checkResult) && !empty($checkResult)) {
            return redirect('admin/department_create')
                            ->with('error', 'Duplicate Data Found')
                            ->withInput();
        }

        $insertData = [
            'dep_name'     => $request->dep_name,
            'dep_details'  => $request->dep_details
            
        ];
        $insertResult = DB::table('departments')->insert($insertData);
        return redirect('admin/department_create')
                        ->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function department_list() {
        
        $pageTitle = '';
        $pageData = [
            'pageTitle' => 'Departments List',
            'formAction' => '',
            'redirecturl' => ''
        ];
        $list = DB::table('departments')->get();
        return View('backend.Departements.list', compact('list', 'pageData'));
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
