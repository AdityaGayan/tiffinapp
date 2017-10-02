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

Route::get('/login',function(){
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', function () {
    return view('orders');
});

Route::get('/tiffins/{index}', function ($index) {
    return view('tiffins')->with('bookingid',$index);
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/foods', function () {
    return view('foods');
});

Route::get('/showfood/{index}', function ($index) {
    return view('showfood')->with('foodid',$index);
});

Route::get('/showtiffin/{index}', function ($index) {
    return view('showtiffin')->with('tiffinid',$index);
});

Route::get('/showuser/{index}', function ($index) {
    return view('showuser')->with('id',$index);
});

Route::get('/showfood', function () {
    return view('showfood');
});

Route::get('/showtiffin', function () {
    return view('showtiffin');
});


Route::get('/showorder/{index}', function ($index) {
    return view('showorder')->with('bookingid',$index);
});

Route::get('/createfood', function () {
    return view('createfood');
});

Route::get('/showuserbooking/{index}', function ($index) {
    return view('showuserbooking')->with('id',$index);
});

Route::get('/showuserbooking/showusertiffins/{index}/{indexx}', function ($index,$indexx) {
    return view('showusertiffins')->with('id',$index)->with('bookingid',$indexx);
});

Route::get('/createfood',function(){
    return view('createfood');
});

Route::get('/createuser',function(){
    return view('createuser');
});

Route::get('/createorder',function(){
    return view('createorder');
});

