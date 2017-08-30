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

Route::get('/generate', 'HomeController@generate');
Route::get('/home/{id}', 'HomeController@api');

//Register API Controller
Route::get('/register', 'Auth\RegisterController@registerView')->name('register');
Route::post('/post-register', 'Auth\RegisterController@postRegister')->name('post_register');  //

//Login Post
Route::post('/login-post', 'Auth\LoginController@postLogin')->name('loginPost');  //
//Auth::routes();
