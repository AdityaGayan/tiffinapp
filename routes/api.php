<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//APP INFO
Route::get('/info', 'appcontroller@info');

//Registration and verification
Route::post('/verifyotp', 'msg@verifyaccount');
Route::post('/register','usercontroller@register');
Route::post('/login','usercontroller@login');
Route::post('/logout','usercontroller@logout');
Route::post('/resendotp','msg@getotp');

Route::post('/password/forget', 'msg@getotp');
Route::post('/password/reset', 'usercontroller@resetpassword');

//FOOD
Route::get('/food', 'foodcontroller@food');
Route::get('/breakfast','foodcontroller@breakfast');
Route::get('/lunch','foodcontroller@lunch');
Route::get('/dinner','foodcontroller@dinner');
//booking option
Route::get('/bookingoption','foodcontroller@bookingoption');
//create booking
Route::post('/createbooking','foodcontroller@createbooking');
//viewbooking
Route::post('/viewbooking','foodcontroller@viewbooking');
//viewtiffins
Route::post('/viewtiffins','foodcontroller@viewtiffins');
//updatetiffin
Route::post('/updatetiffin','foodcontroller@updatetiffin');

//admin side

//create food
Route::post('/createfood','admincontroller@createfood');
//update foof
Route::post('/updatefood','admincontroller@updatefood');
//delete food
Route::post('/deletefood','admincontroller@deletefood');
//delete user
Route::post('/deleteuser','admincontroller@deleteuser');
Route::post('/updateuser','admincontroller@updateuser');
//show booking
Route::post('/showuserbookings','admincontroller@showuserbookings');
//show tiffins
Route::post('/showusertiffins','admincontroller@showusertiffins');
//tiffins on a date
Route::post('/showtiffinson','admincontroller@showtiffinson');
Route::get('/showbookings','admincontroller@showbookings');
Route::get('/showusers','admincontroller@showusers');
Route::get('/showtiffins','admincontroller@showtiffins');

Route::post('/createuser','admincontroller@createuser');

Route::post('/verifyadmin','admincontroller@verifyadmin');
Route::post('/updatebooking','admincontroller@updatebooking');