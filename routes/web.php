
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



Route::group(['prefix'=>'api','middleware'=>'cors'], function(){
	Route::post('/login', 'AuthController@login');

	Route::group(['middleware' => 'jwt.auth'], function() {
	    
	});
	Route::get('/schedule/{date}','ControllerGetAllJadwal@getJadwalbyDate');
	Route::get('/schedule/{user}','ControllerGetAllJadwal@getJadwalbyUser');
	Route::post('/schedule','ControllerGetAllJadwal@createNewJadwal');
	Route::put('/schedule/{id}','ControllerGetAllJadwal@updateSchedule');
	Route::delete('/schedule/{id}','ControllerGetAllJadwal@deleteSchedule');
	Route::get('/schedule/{id}','ControllerGetAllJadwal@detailSchedule');

	Route::get('/schedules','ControllerSchedule@getSchedule');

	Route::get('/users','users_controller@getAllUser');
	Route::delete('/users/{id}','users_controller@deleteUser');
	Route::post('/users','users_controller@registerUser');
	Route::put('/users/{id}','users_controller@editUser');
	Route::get('/users/{id}','users_controller@detailUser');
	
	Route::get('/findAllBaby','bayi_controller@getAllBaby');
	Route::get('/findBaby/{id}','bayi_controller@getBaby');


	// contoh routes, delete ketika stagging
	Route::get('/coba','ResourceControllerExample@index');
	Route::post('/coba','ResourceControllerExample@store');
	Route::get('/coba/{id}', 'ResourceControllerExample@show');
	Route::put('/coba/{id}', 'ResourceControllerExample@update');
	Route::delete('/coba/{id}', 'ResourceControllerExample@destroy');


	//route controller bayi
	Route::get('/bayi','bayi_controller@getAllBaby');
	Route::get('/bayi/{id}','bayi_controller@showBaby');


	//Vaksin Route /Yogie

	Route::get('/vaksin','ControllerVaccines@index');
	Route::get('/vaksin/{id}','ControllerVaccines@show');
	Route::put('/vaksin/{id}','ControllerVaccines@update');
	Route::delete('/vaksin/{id}','ControllerVaccines@destroy');
	Route::post('/vaksin','ControllerVaccines@store');

});
