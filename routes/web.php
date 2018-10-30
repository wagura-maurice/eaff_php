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

Route::post('/credit/account/', function (\Illuminate\Http\Request $request) {
	return \EAFF::credit_account($request);
})->name('credit.account');

Route::post('/debit/account', function (\Illuminate\Http\Request $request) {
	return \EAFF::debit_account($request);
})->name('debit.account');

Route::post('/credit/paybill', function (\Illuminate\Http\Request $request) {
	return \EAFF::credit_paybill($request);
})->name('credit.paybill');

Route::post('/credit/airtime', function (\Illuminate\Http\Request $request) {
	return \EAFF::credit_airtime($request);
})->name('credit.airtime');
