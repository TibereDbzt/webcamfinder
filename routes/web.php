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

ini_set('display_errors', 1);

// Display home page
Route::view('/', 'home');

// Display search page
Route::view('/search', 'search');

// Display register page
Route::view('/register', 'register');

// Display login page
Route::view('/login', 'login');

// Request API list of webcams and display result page
Route::get('/result','SearchWebcamsController@requestAPI');

// Request API one webcam and display webcam page
Route::get('/webcam/{webcam_id}', 'GetCamViewController@view_id')->name('getCam');

// Add a favorite webcam from a user account
Route::post('/add-favorite', 'FavoritesController@insert')->name('add-favorite');

// Delete a favorite webcam from a user account
Route::post('/remove-favorite', 'FavoritesController@delete')->name('remove-favorite');

// Display favorites webcams from a user account
Route::get('/favorites', 'FavoritesController@display')->name('display-favorites');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
