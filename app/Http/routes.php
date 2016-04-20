<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function () {
	    return view('dashboard');
	});
	Route::group(['prefix' => 'departments'], function() {	
		Route::get('/', 'DepartmentsController@index')->name('departments.index');
		Route::get('create', 'DepartmentsController@create')->name('departments.create');
		Route::post('create', 'DepartmentsController@store')->name('departments.store');
		Route::get('{dept}/details', 'DepartmentsController@show')->name('departments.show');
		Route::get('{dept}/edit', 'DepartmentsController@edit')->name('departments.edit');
		Route::put('{dept}/edit', 'DepartmentsController@update')->name('departments.update');
		Route::delete('{dept}/destroy', 'DepartmentsController@destroy')->name('departments.destroy');
	});
	Route::group(['prefix' => 'students'], function() {
		Route::get('/', 'StudentsController@index')->name('students.index');
		Route::get('create', 'StudentsController@create')->name('students.create');
		Route::post('create', 'StudentsController@store')->name('students.store');
		Route::get('{student}/details', 'StudentsController@show')->name('students.show');
		Route::get('{student}/edit', 'StudentsController@edit')->name('students.edit');
		Route::put('{student}/edit', 'StudentsController@update')->name('students.update');
		Route::delete('{student}/destroy', 'StudentsController@destroy')->name('students.destroy');
	});
});

Route::auth();
