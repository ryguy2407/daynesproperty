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
    $listings = \App\Listing::where('listing_state', 'current');
    return view('home')->with('listings', $listings->get());
});

Route::resource('listing', 'ListingsController');
Route::resource('sync-listings', 'CRMListingsController');
Route::get('/{id}', 'PagesController@show');
