<?php

namespace App\Http\Controllers\cms\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
        return View('cms.dashboard');
    }
}
