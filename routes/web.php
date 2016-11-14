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



Route::group(['prefix'=>'api'], function(){
	Route::get('/schedule','ControllerGetAllJadwal@getJadwalbyDate');
	Route::get('/schedule/{id}','ControllerGetAllJadwal@getJadwalbyUser');
	Route::post('/schedule','ControllerGetAllJadwal@createNewJadwal');

	Route::get('/users','users_controller@getAllUser');
	Route::delete('/users','users_controller@deleteUser');
	Route::post('/users','users_controller@registerUser');
	
	Route::get('/findAllBaby','bayi_controller@getAllBaby');
	Route::get('/findBaby/{id}','bayi_controller@getBaby');
});
