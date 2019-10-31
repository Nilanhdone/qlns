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

Route::get('/','HomeController@index')->name('home');

Route::get('lang/{locale}','HomeController@lang');

// Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout','Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@create');

Route::get('update','AdminController@showUpdateForm')->name('update');
Route::post('update', 'AdminController@update');

Route::get('change-password','HomeController@showChangePasswordForm')->name('change-password');
Route::post('change-password', 'HomeController@changePassword');

Route::get('profile','HomeController@showProfile')->name('profile');
