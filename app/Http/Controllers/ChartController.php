<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class ChartController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        return view('backend.chart.index') ;
        
    }

}
