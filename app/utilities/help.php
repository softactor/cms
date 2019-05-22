<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

function show_enginner_data() {
    
   
   $list = DB::table('users')->Join('roles', 'role_id', '=', 'roles.roles_id')->where('role_name','=','engineer');
   
   return view('backend.modal.complains', compact($list));
}