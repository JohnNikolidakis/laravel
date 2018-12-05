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

Route::get('/test','RegisterController@create')->middleware('auth');

Route::get('/table','RegisterController@store')->middleware('auth');

Route::get('/garbage_register','GarbageRegisterController@create')->middleware('auth');

Route::get('/garbage_bin_table','GarbageRegisterController@store')->middleware('auth');

Route::get('/garbage_bin_table_search','GarbageRegisterController@search')->middleware('auth');

Route::get('/garbage_bin_edit','GarbageRegisterController@edit')->middleware('auth');

Route::get('/garbage_register_edit','GarbageRegisterController@registerEdit')->middleware('auth');

Route::get('/','GarbageRegisterController@mainpage');
	
Route::fallback(function() {
	return view('not_found');
})->middleware('auth');

Route::get('/vehicle_register','VehicleController@create')->middleware('auth');

Route::get('/vehicletable','VehicleController@store')->middleware('auth');

Route::get('ajax', function(){ return view('ajax'); })->middleware('auth');

Route::get('chart', function(){ return view('chart'); })->middleware('auth');

Route::get('ch', function(){ return view('ch'); })->middleware('auth');

Route::post('/postajax','AjaxController@post')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
