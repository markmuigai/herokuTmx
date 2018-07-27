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

//Display current delivery and driver
//Pass the delivery for the authenticated user where the completion status is false
//Pass the driver for the delivery associated with logged in user
Route::get('/mydelivery/{delivery}', 'DeliveriesController@mydelivery')->name('mydelivery');

//Display the driver that has been selected for the pickup
Route::get('/driver', 'VehiclesController@show');

//Show the driver the deliveries
Route::get('/todeliver', 'DeliveriesController@deliveryRequest');

//Show sign up as a driver form
Route::get('/driver', 'VehiclesController@create');

//Store Vehicle Details for the Driver
Route::post('/driver', 'VehiclesController@store');