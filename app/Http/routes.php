<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('panel', 'PanelController@index');
Route::get('about', 'AboutController@index');

Route::resource('settings', 'SettingsController');

Route::resource('cities', 'CitiesController');

Route::resource('tags', 'TagsController');

Route::get('events/{events}/locations', 'EventsController@locations');
Route::get('events/{events}/galleries', 'EventsController@galleries');
Route::get('events/{events}/sponsors', 'EventsController@sponsors');
Route::get('events/validasi', 'EventsController@validasi');

Route::resource('events', 'EventsController');

Route::patch('validasi/{events}', 'EventsController@updatestatus');

Route::resource('locations', 'LocationsController');
Route::resource('sponsors', 'SponsorsController');
Route::resource('galleries', 'GalleriesController');


Route::resource('users', 'UsersController');


Route::get('/', 'DashboardController@index');
Route::get('latest', 'DashboardController@latest');
Route::get('oldest', 'DashboardController@oldest');
Route::get('search', 'DashboardController@search');
Route::get('categories/{tags}', 'DashboardController@categories');
Route::get('/{events}', 'DashboardController@show');
