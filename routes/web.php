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

// USER
    //Forget password
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Change password
    Route::get('change-password','HomeController@showChangePasswordForm')->name('change-password');
    Route::post('change-password', 'HomeController@changePassword');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    // Logout
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::get('profile','HomeController@showProfile')->name('profile');
    // First login
    Route::post('first-login','Auth\LoginController@changePassword')->name('first-login');

// ADMIN
    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    // Update
    Route::get('update','AdminController@showUpdateForm')->name('update');
    Route::post('update', 'AdminController@update');
    // Staff list
    Route::get('staff-list','AdminController@showStaffList')->name('staff-list');

// EMPLOYEE
    // send vacation leave
    Route::get('send-vacation','EmployeeController@showVacationForm')->name('send-vacation');
    Route::post('send-vacation', 'EmployeeController@sendVacation');
