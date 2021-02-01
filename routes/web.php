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

Route::match(['get', 'post'], '/admin','AdminController@login');
Route::get('/logout','AdminController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>['adminlogin']],function(){
	
	Route::get('/admin/dashboard','AdminController@dashboard');
	//Schooles route
	Route:: match(['get','post'],'/admin/add-school','SchoolController@addSchool');
	Route:: get('/admin/view-school','SchoolController@viewSchool');
	Route:: match(['get','post'],'/admin/edit-school/{id}','SchoolController@editSchool');
	Route:: match(['get','post'],'/admin/delete-school/{id}','SchoolController@deleteSchool');

	//Schoole Admins route
	Route:: match(['get','post'],'/admin/add-schooladmin','SchooladminController@addAdmin');
	Route:: get('/admin/view-schooladmin','SchooladminController@viewAdmin');
	Route:: match(['get','post'],'/admin/edit-schooladmin/{id}','SchooladminController@editAdmin');
	Route:: match(['get','post'],'/admin/delete-schooladmin/{id}','SchooladminController@deleteAdmin');
	//active status by admin
	Route:: get('/admin/view-students','InfoController@viewStudent');
	Route:: get('/admin/view-projects','InfoController@viewProject');
	Route:: get('/admin/view-readings','InfoController@viewReading');
	Route:: match(['get','post'],'/active/{id}','InfoController@activestatus');
});




// Users Register and LoginPage
Route::get('/login-register','UsersController@userLoginRegister');
//Register
Route::match(['GET','POST'],'/register','UsersController@register');
//Login
Route::match(['GET','POST'],'/user-login','UsersController@login');
Route::get('/student-logout','UsersController@logout');
Route::group(['middleware'=>['frontlogin']],function(){
	// student route
	Route::get('/index','IndexController@index');
	Route::get('/student/project','IndexController@project');
	Route::get('/student/reading','IndexController@reading');
	Route::match(['get','post'],'/student/add-information','InfoController@addInformation');
	Route::match(['get','post'],'/student/add-reading','InfoController@addReading');
	Route::match(['get','post'],'/student/add-project','InfoController@addProject');	
	
});



