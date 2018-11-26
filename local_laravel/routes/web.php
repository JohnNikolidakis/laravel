<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tests','RegisterController@create')->middleware('auth');

Route::get('/table','RegisterController@store')->middleware('auth');

Route::get('/chart', function () {
    return view('chart');
})->middleware('auth');

Route::fallback(function() {
	return view('not_found');
})->middleware('auth');

Route::get('/vehicle_register','VehicleController@create')->middleware('auth');

Route::get('/vehicletable','VehicleController@store')->middleware('auth');

Route::get('ajax', function(){ return view('ajax'); })->middleware('auth');

Route::post('/postajax','AjaxController@post')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
