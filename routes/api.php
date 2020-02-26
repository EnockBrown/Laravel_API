<?php

use Illuminate\Http\Request;

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
    return $request->user();
});

// Route::get('country','Country\CountryController@country');
// //returns country by passed id
// Route::get('country/{id}','Country\CountryController@countryById');
// //returns country by name
// Route::get('country/{name}','Country\CountryController@countryByName');
// //adding a country
// Route::post('country','Country\CountryController@createcountry');
// //update the record country
// Route::put('country/{country}','Country\CountryController@countryupdate');

// use App\Person;
// Route::get('/person/{person}', function(Person $person){

//     return $person;
// });

//Route::get('/person/{person}','Person\PersonController@show');
//Route::apiResource('/person','Person\PersonController');

Route::prefix('v1') -> group(function(){
    Route::apiResource('/person','Person\PersonController')
    -> only([ 'store', 'update', 'destroy', 'show']);

    Route::apiResource('/person', 'Person\PersonController')
    ->only(['index']);
    Route::apiResource('/product', 'Person\ProductController');
    Route::apiResource('/payment', 'Person\PaymentController');
    Route::apiResource('/reviews', 'Person\ReviewsController');
    Route::apiResource('/user', 'Person\UsersController');

    //Route::post('/phone_verification', 'Person\PhoneVerificationController@create');
    //Route::post('/phone_verification', 'Person\PhoneVerificationController@postVerify')->name('verify');
    Route::apiResource('/phone_verification', 'Person\PhoneVerificationController');

    Route::post('login', 'ApiAuthController@login');
 Route::post('register', 'ApiAuthController@register');
 Route::get('getUser', 'ApiAuthController@getUser');
 Route::get('file/images','Person\FileController@CountryList');
 Route::post('file/images','Person\FileController@countrySave');
//  Route::group(['middleware' => 'auth:api'], function(){
//  Route::post('getUser', 'ApiAuthController@getUser');});


});

