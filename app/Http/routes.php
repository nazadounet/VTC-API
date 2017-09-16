<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:8000/');
header('Access-Control-Allow-Origin: http://127.0.0.1:8080/');
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

Route::post('/api/v1/userprofil', 'UserProfilCtrl@store');


Route::post('/api/v1/fileUpload', 'uploadFileCtrl@store');


Route::post('/api/v1/driverProfil', 'DriverCtrl@store');

Route::post('/api/v1/getDriverStatus', 'DriverCtrl@getDriverStatus');

Route::post('/api/v1/getDriverProfil', 'DriverCtrl@returnDriverProfil');

Route::post('/api/v1/contact', 'email_controller@contactFormWebsite');


