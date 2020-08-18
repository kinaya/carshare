<?php

use Illuminate\Support\Facades\Route;

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

// Display the front page
Route::get('/', 'PagesController@index');

// Route for the about page
Route::get('/about', 'PagesController@about');

// Route for the calendar page
Route::get('/calendar', 'PagesController@calendar');

// Route for a users page
Route::get('/users/{id}', 'UsersController@show');

// Routes for drives
Route::resource('rides', 'RidesController');

// Routes for authentication
Auth::routes();

// Route for the logged in dashboard
Route::get('/home', 'HomeController@index')->name('home');
