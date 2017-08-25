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

//Single Job Get
Route::middleware('auth:api')->get('/single-job/{id}', 'JobController@getSingleJob');

Route::post('/register', 'Auth\RegisterController@registerUser');

//Job Post Api
Route::post('/job-post', 'CustomerController@GarageLookUp_post')->name('GarageLookUp_post');

//Get Best 3 offers.. from offers for that particular job.
Route::middleware('auth:api')->get('/best-offers/{id}', 'JobController@getBestOffers');

Route::get('/best-offers/{id}', 'JobController@getBestOffers')->name('get_Best_offers');

//Select offers from Garages
Route::middleware('auth:api')->post('/select-offer', 'JobController@selectOffer');

//Complete Offer
Route::middleware('auth:api')->post('/complete-job', 'JobController@completeJob')->name('completeJob');

//Route::get('/best-offers/{id}', 'JobController@getBestOffers');

//Customer Jobs
Route::middleware('auth:api')->get('/customer-jobs', 'JobController@getCustomerJobs')->name('getCustomerJobs');

//Garage Jobs 
Route::middleware('auth:api')->get('/garage-in-progress-jobs', 'JobController@getGarageInProgressJobs')->name('getGarageJobs');

//Customer Invoices
Route::middleware('auth:api')->get('/customer-invoices', 'JobController@getCustomerInvoices')->name('getCustomerInvoicse');

//Garage Invoices
Route::middleware('auth:api')->get('/garage-invoices', 'JobController@getGarageInvoices')->name('getGarageInvoices');


//Single Invoice
Route::middleware('auth:api')->get('/single-invoice/{id}', 'JobController@getSingleInvoice')->name('getSingleInvoice');

//customerProfile
Route::middleware('auth:api')->get('/customerProfile', 'ProfileController@customerProfile')->name('customerProfile');

//Edit customerProfile
Route::middleware('auth:api')->get('/edit-customerProfile', 'ProfileController@editProfile_view')->name('customerProfile');

//edit Customer Profile
Route::middleware('auth:api')->post('/editCustomerProfile', 'ProfileController@customerProfile_edit')->name('customerProfile_edit');


/*Garage Section*/
Route::group(['middleware' => ['auth:api']], function () {
   //send proporsals
   Route::post('/sendProposal', 'GarageController@sendProposal');

   //Accepted Job Lists
   Route::get('/jobLists/{id}', 'GarageController@jobLists');

   //Get Garage Reviews
   Route::get('/reviews/{id}', 'GarageController@reviews');

   //Get Garage Notifications
   Route::get('/notifications/{id}', 'GarageController@reviews');


   //Garage Registration
   Route::post('/garageRegistration', 'ProfileController@garageRegistration');
});