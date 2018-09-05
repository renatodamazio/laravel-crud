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


Route::get('/users/find', 'UserController@find')->name('users.find');

Route::get('/users', 'UserController@index')->name('users.index');

Route::group(['middleware' => 'auth'], function(){
	
	Route::get('/dash', 'DashController@index')->name('dash');
	
});

Route::get('/users/create', 'UserController@create')->name('users.create');

Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');

Route::get('/users/profile/{id}', 'UserController@profile')->name('users.profile');

Route::post('/users/save', 'UserController@save')->name('users.save');

Route::post('/users/update/{id}', 'UserController@update')->name('users.update');

Route::post('/users/delete/{id}', 'UserController@delete')->name('users.delete');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// Route::get('/', 'UploadController@index');

