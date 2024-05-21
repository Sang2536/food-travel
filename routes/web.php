<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/test-jquery', function () {
    $date = now();
    $dateNew = $date->format('Y-m-d\TH:i:s.v\Z');

    dd($date, $dateNew);
    return view('test-jquery');
});

Route::get('/docs/api', function () {
    return view('vendor/l5-swagger/index');
});

//  template
Route::get('error', 'App\Http\Controllers\ErrorController@error');

Route::get('document', 'App\Http\Controllers\DocsController@index');

//  sidebar
Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'uid']);

Route::resource('account', 'App\Http\Controllers\AccountController');

Route::resource('contact', 'App\Http\Controllers\ContactController');

Route::resource('product', 'App\Http\Controllers\ProductController');

Route::resource('transaction', 'App\Http\Controllers\TransactionController');

Route::get('system', 'App\Http\Controllers\SystemController@index');
Route::put('system/update', 'App\Http\Controllers\SystemController@update');
Route::get('system/tutorial', 'App\Http\Controllers\SystemController@tutorial');


