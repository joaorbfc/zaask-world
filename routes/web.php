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

// Route::get('/', function () {
//     return view('welcome');
// });

// API Routes
// Route::group(array('prefix' => 'api'), function () {

//     // v1 Routes
//     Route::group(array('prefix' => 'v1'), function () {
         
//         // Country Routes
//         Route::group(array('prefix' => 'country'), function () {
//             Route::get('{code}', 'CountryController@getCountryByCode', 200);
//         });

//         Route::group(array('prefix' => 'getCities'), function () {
//             Route::get('{code}', 'CityController@getCities', 200);
//         });

//         Route::group(array('prefix' => 'getCity'), function () {
//             Route::get('{id}', 'CityController@getCity', 200);
//         });

//     });


// });