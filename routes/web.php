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

Route::get('/score', function () {
    $data = json_decode(file_get_contents(route('txn.data')), true);
    return view('score', ['score' => \EAFF::score($data)]);
})->name('score');

Route::get('/txn/data', function () {
    return \EAFF::txn_data();
})->name('txn.data');


/*Route::post('/credit/account/', function (\Illuminate\Http\Request $request) {
	return \EAFF::credit_account($request);
})->name('credit.account');

Route::post('/debit/account', function (\Illuminate\Http\Request $request) {
	return \EAFF::debit_account($request);
})->name('debit.account');

Route::post('/debit/paybill', function (\Illuminate\Http\Request $request) {
	return \EAFF::debit_paybill($request);
})->name('debit.paybill');

Route::post('/debit/airtime', function (\Illuminate\Http\Request $request) {
	return \EAFF::debit_airtime($request);
})->name('debit.airtime');*/