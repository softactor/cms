<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 * *****************************************************************************
 * SAMPLE ROUE 
 * *****************************************************************************
 */
Route::get('role/list', 'RoleController@index')->name('role_list');

Route::get('admin/create_complain_type', 'ComplainTypeController@create');
Route::post('admin/store_complain_type', 'ComplainTypeController@store_complain_type');
Route::get('admin/list_complain_type', 'ComplainTypeController@complain_list');
Route::get('admin/get_complain_type_edit_data', 'ComplainTypeController@get_complain_type_edit_data');
