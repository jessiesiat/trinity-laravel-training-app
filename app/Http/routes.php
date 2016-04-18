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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'departments'], function() {

	Route::get('/', 'DepartmentsController@index')->name('departments.index');
	Route::get('create', 'DepartmentsController@create')->name('departments.create');
	Route::post('/', 'DepartmentsController@store')->name('departments.store');
	Route::get('{dept}', 'DepartmentsController@show')->name('departments.show');
	Route::get('{dept}/edit', 'DepartmentsController@edit')->name('departments.edit');
	Route::put('{dept}', 'DepartmentsController@update')->name('departments.update');
	Route::delete('{dept}', 'DepartmentsController@destroy')->name('departments.destroy');

});

