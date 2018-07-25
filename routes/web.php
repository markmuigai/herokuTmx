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



Auth::routes();

//Route::resource('deliveries', 'DeliveriesController');

//display form to request for a delivery
Route::get('/', 'DeliveriesController@create');

//Post delivery information
Route::post('/', 'DeliveriesController@store');

//Display the driver that has been selected for the pickup
Route::get('/driver', 'VehiclesController@show');

//Show sign up as a driver form
Route::get('/driver', 'VehiclesController@create');

//Store Vehicle Details for the Driver
Route::post('/driver', 'VehiclesController@store');