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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/dashboard', 'cms\backend\DashboardController@index');
/*
 * *****************************************************************************
 * SAMPLE ROUE 
 * *****************************************************************************
 */
Route::get('role/list', 'RoleController@index')->name('role_list');

Route::get('admin/create_complain_type', 'ComplainTypeController@create')->name('admin.complain_type.create');
Route::post('admin/store_complain_type', 'ComplainTypeController@store_complain_type');
Route::get('admin/list_complain_type', 'ComplainTypeController@complain_list');
Route::get('admin/get_complain_type_edit_data', 'ComplainTypeController@get_complain_type_edit_data');
Route::post('admin/update_complain_type_data', 'ComplainTypeController@update_complain_type_data');
Route::get('admin/delete_complain_type_data', 'ComplainTypeController@delete_complain_type_data');

