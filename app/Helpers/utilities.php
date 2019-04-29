<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\DB;

function get_tabledata_by_table($table_name){
    $tableData  =   DB::table($table_name)->get();
    return $tableData;
}
function get_tablerow_by_id($table_name, $id){
    $tableData  =   DB::table($table_name)->where('id', $id)->first();
    return $tableData;
}
