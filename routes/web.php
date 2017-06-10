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


Route::group(['middleware' => 'role:Root|Admin'], function() {
	Route::get('/admin', array(
		'as' => 'admin.index',
		'uses' => 'AdminController@index',
		));
	Route::resource('/admin/user', 'UserController');
	
	Route::get('/serverside', array(
		'as' => 'user.serverSide',
		'uses' => 'userController@data'
		));
});


	Route::get('components', 'HomeController@components');

	Route::get('/test', function() {
		$user = App\User::all();
		return view('admin.profile.index')
		->with('user', $user);
	});



