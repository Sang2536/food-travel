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

Route::get('/test', function () {
    return view('test');
});

//  docs/api
Route::get('/docs/api', function () {
    return view('vendor/l5-swagger/index');
});

//  template / page
Route::get('error', 'App\Http\Controllers\ErrorController@error');
Route::get('document', 'App\Http\Controllers\DocsController@index');

//  Page
Route::get('article', 'App\Http\Controllers\PageController@article');
Route::get('service', 'App\Http\Controllers\PageController@service');
Route::get('about-us', 'App\Http\Controllers\PageController@aboutUs');

//  sidebar
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');

Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'uid']);
Route::delete('user/clear-log/{uid}', 'App\Http\Controllers\UserActionController@clearLog')->name('user.clear-log');
Route::put('user/create-log/{uid}', 'App\Http\Controllers\UserActionController@createLog')->name('user.create-log');

Route::resource('account', 'App\Http\Controllers\AccountController');
Route::delete('account/clear-log/{account}', 'App\Http\Controllers\AccountActionController@clearLog')->name('account.clear-log');
Route::put('account/create-log/{account}', 'App\Http\Controllers\AccountActionController@createLog')->name('account.create-log');

Route::resource('contact', 'App\Http\Controllers\ContactController');

Route::resource('product', 'App\Http\Controllers\ProductController');

Route::resource('product-category', 'App\Http\Controllers\ProductCategoryController');

Route::resource('brand', 'App\Http\Controllers\BrandController');

Route::resource('unit', 'App\Http\Controllers\UnitController');

Route::resource('coupons', 'App\Http\Controllers\CouponsController');

Route::resource('transaction', 'App\Http\Controllers\TransactionController');

Route::get('system', 'App\Http\Controllers\SystemController@index')->name('system.index');
Route::put('system/update', 'App\Http\Controllers\SystemController@update');
Route::get('system/tutorial', 'App\Http\Controllers\SystemController@tutorial');


