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

Route::get('/', function() {
	return view('form');
});

Route::post('register', "UserController@register");

Route::get('all', "UserController@all");

Route::get('/ViewUser/{id}', "UserController@find");

Route::get('/Delete/{id}', "UserController@delete");

Route::get('/EditProfile/{id}', "UserController@editProfile");

Route::patch('/UpdateProfile/{id}', "UserController@updateProfile");

Route::get('/ChangePassword/{id}', "UserController@changePassword");;

Route::patch('/UpdatePassword/{id}', "UserController@updatePassword");