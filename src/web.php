<?php


Route::get('calculator', function(){
	echo 'Hello from the calculator package!';
});

Auth::routes();

Route::get('/ahmed', 'TestController@index');

// this middleware for backend authenticated users
Route::group(['middleware' => ['auth']], function () {
	// Dashboard landing page
	Route::get('/backend/dashboard', 'BackendHomeController@index');
	//Articles Routes
	Route::resource('/backend/articles', 'ArticlesController');
	//Toggle Active
	Route::post('/common/toggle_active', 'CommonController@toggleActive');
});

// this middleware is just for admin
Route::group(['middleware' => ['admin']], function () {
	//Admins Roots
	Route::resource('/backend/admins', 'AdminsController');
	//Change Password for Admin
	Route::post('/backend/admins/change_password', 'AdminsController@changePassword');
});

Route::get('/test', 'TestController@index');

Route::get('/backend', function () {
	if(Auth::user())
		return Redirect::to('/backend/dashboard');
	else
		return Redirect::to('login');
});

// logout route
Route::get('/logout', function () {
	Auth::logout();
	return Redirect::to('login');
});
