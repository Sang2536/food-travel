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

Route::resource('user', 'App\Http\Controllers\UserController::class');

Route::resource('account', 'App\Http\Controllers\AccountController::class');

Route::resource('contact', 'App\Http\Controllers\ContactController::class');

Route::resource('product', 'App\Http\Controllers\ProductController::class');

Route::resource('transaction', 'App\Http\Controllers\TransactionController::class');

Route::get('systems', 'App\Http\Controllers\SystemController@index');
Route::put('systems/update', 'App\Http\Controllers\SystemController@update');
Route::get('systems/tutorial', 'App\Http\Controllers\SystemController@tutorial');


