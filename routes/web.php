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

Route::get('/login', 'DashboardController@login');
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');


Route::group(['middleware' => ['cek_login']], function () {

	Route::get('/logout', 'DashboardController@logout');

	Route::get('/', 'DashboardController@home');
	Route::get('/search', 'DashboardController@search');
	Route::get('/detail-product', 'DashboardController@detailProduct');
	Route::get('/profile', 'DashboardController@profile');


});
