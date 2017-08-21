<?php

use Illuminate\Http\Request;
use app\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return User::all();
});

Route::middleware('auth:api')->get('/jobs', 'JobController@getJobs');

Route::post('/register', 'Auth\RegisterController@registerUser');

//Job Post Api
Route::post('/job-post', 'CustomerController@GarageLookUp_post')->name('GarageLookUp_post');
