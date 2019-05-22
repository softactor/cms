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

// Compline Feedback route

Route::get('admin/feedback_list', 'FeedbackController@feedback_list')->name('admin.feedback.list');
Route::get('admin/feedback_create', 'FeedbackController@feedback_create')->name('admin.feedback.create');
Route::get('admin/feedback_edit/{id}', 'FeedbackController@feedback_edit');
Route::post('admin/feedback_store', 'FeedbackController@feedback_store');
Route::post('admin/feedback_update', 'FeedbackController@feedback_update');
Route::get('admin/feedback_delete', 'FeedbackController@feedback_delete');


// Complain Details route

Route::get('admin/complain_details_list', 'ComplainDetailsController@complain_details_list')->name('admin.complain_details.list');

Route::get('admin/complain_details_create', 'ComplainDetailsController@complain_details_create')->name('admin.complain_details.create');
Route::get('admin/complain_details_edit', 'ComplainDetailsController@complain_details_edit');
Route::post('admin/complain_details_store', 'ComplainDetailsController@complain_details_store');
Route::get('admin/complain_details_update', 'ComplainDetailsController@complain_details_update');
Route::get('admin/complain_details_delete', 'ComplainDetailsController@complain_details_delete');




// user routeF
Route::get('admin/create_user','UserController@create_users')->name('create_complain');
Route::post('admin/store_user','UserController@store_users');
Route::get('admin/list_users', 'UserController@list_users')->name('admin.user.list');
Route::get('admin/view_user', 'UserController@view_users');
Route::get('admin/get_User_list_data', 'ComplainTypeController@get_User_list_data');
Route::post('admin/update_user_list_data', 'ComplainTypeController@update_user_list_data');
Route::get('admin/delete_user_data', 'UserController@delete_user_data');


//  DEPARTMENT 

Route::get('admin/department_list', 'DepartmentController@department_list')->name('admin.departement.list');
Route::get('admin/department_create', 'DepartmentController@department_create')->name('admin.departement.create');
Route::get('admin/department_edit', 'DepartmentController@department_edit');
Route::post('admin/department_store', 'DepartmentController@department_store');
Route::get('admin/department_update', 'DepartmentController@department_update');
Route::get('admin/department_delete', 'DepartmentController@department_delete');


// executive role  routes

Route::get('executive/list_complain','ExecutiveController@list_complains');
Route::get('admin/executive/eng_data', 'ComplainDetailsController@get_enginner_info');
Route::get('admin/executive/viewComplains', 'ComplainDetailsController@viewComplains');
Route::post('admin/executive/assign_complains', 'ComplainDetailsController@assign_complain')->name('assign');
Route::post('admin/executive/update_complains', 'ComplainDetailsController@update_complain');


Route::get('engineer/dashboard','EngineerController@index');
Route::post('engineer/accepted','EngineerController@Accepted_Button');

Route::get('admin/executive/delete_complain_data', 'ComplainDetailsController@delete_complain_data');