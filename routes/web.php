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

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/verify', 'Person\VerifyController@getVerify')->name('getverify');
Route::post('/verify', 'Person\VerifyController@postVerify')->name('verify');


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/dashboard', 'PagesController@dashboard');
Route::resource('/products', 'Person\ProductsViewController');
Route::resource('/payments', 'Person\PaymentsViewController');
Route::resource('/orders', 'Person\OrdersViewController');
Route::resource('/users', 'Person\UsersViewController');


Route::get('/home', 'HomeController@index');
