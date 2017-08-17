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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop-lookup', 'CustomerController@GarageLookUp');

Route::post('/shop-lookup', 'CustomerController@GarageLookUp_post')->name('GarageLookUp_post');

Route::get('/register', 'Auth\RegisterController@registerView')->name('register');

Route::post('/register-submit', 'Auth\RegisterController@registerSubmit')->name('registerFormSubmit');
