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

Route::post('/job-psot', 'CustomerController@GarageLookUp_post')->name('GarageLookUp_post');

Route::get('/register', 'Auth\RegisterController@registerView')->name('register');

Route::post('/register-submit', 'Auth\RegisterController@registerSubmit')->name('registerFormSubmit');

//Customer Profile Routes

Route::get('/profile', 'ProfileController@customerProfile')->name('customerProfile');
Route::get('/editProfile', 'ProfileController@customerProfile_edit')->name('customerProfile_edit');
Route::post('/editProfile', 'ProfileController@customerProfile_edit_post')->name('customerProfile_edit_post');

Route::get('/best-offers/{id}', 'JobController@getBestOffers')->name('get_Best_offers');

Route::post('/select-offer/', 'JobController@selectOffer')->name('sel_offer');

//Complete a Job
Route::post('/complete-job/', 'JobController@completeJob')->name('sel_offer');