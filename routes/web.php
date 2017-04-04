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
    return view('index');
});

/*Route::get('/test', function () {
    return view('test');
});*/

//Route::get('/test', 'HomeController@test');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/transactions', 'HomeController@transactions');

Route::get('/donations', 'HomeController@donations');

Route::post('/paymentmade', 'HomeController@paid');
Route::post('/cancelpayment', 'HomeController@cancelpayment');

Route::post('/userdetails', 'HomeController@getUserdetails');
Route::post('/cantpay', 'HomeController@performUserCantPay');
Route::post('/paymentdetails', 'HomeController@getPaymentDetails');

Route::post('/confirmpayment', 'HomeController@confirmPayment');
