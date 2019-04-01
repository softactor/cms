<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

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
        $validation     =   Validator::make($request->all(), [
                        'title' => 'required'
                    ]);
        if ($validation->fails()) {
            return redirect('admin/create_complain_type')
                        ->withErrors($validation)
                        ->withInput();
        }
        
        
    }
}
