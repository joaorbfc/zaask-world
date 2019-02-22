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

Route::group(array('prefix' => 'v1'), function () {
    
    Route::group(array('prefix' => 'deleteCity'), function () {
        Route::delete('{id}', 'CityController@deleteCity');
    });

   Route::post('addCity','CityController@addCity');

   Route::put('updateHS/{code}','CountryController@updateHS');
   // Country Routes
   Route::group(array('prefix' => 'country'), function () {
    Route::get('{code}', 'CountryController@getCountryByCode', 200);
    });

    Route::group(array('prefix' => 'getCities'), function () {
        Route::get('{code}', 'CityController@getCities', 200);
    });

    Route::group(array('prefix' => 'getCity'), function () {
        Route::get('{id}', 'CityController@getCity', 200);
    });
});
