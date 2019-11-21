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
Route::get('update/lang/{locale}','HomeController@lang');
Route::get('detail/lang/{locale}','HomeController@lang');
Route::get('edit-basic/lang/{locale}','HomeController@lang');

// USER
    //Forget password
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Change password
    Route::get('change-password','HomeController@showChangePasswordForm')->name('change-password');
    Route::post('change-password','HomeController@changePassword');
    // Login
    Route::get('login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('login','Auth\LoginController@login');
    // Logout
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::get('profile','HomeController@showProfile')->name('profile');
    // First login
    Route::post('first-login','Auth\LoginController@changePassword')->name('first-login');

// EMPLOYEE
    // send vacation leave
    Route::get('send-vacation','EmployeeController@showVacationForm')->name('send-vacation');
    Route::post('send-vacation','EmployeeController@sendVacation');

// MANAGER
    // check vacation leave
    Route::get('check-vacation','ManagerController@showVacationList')->name('check-vacation');
    Route::get('accept/{id}','ManagerController@accept')->name('accept');
    Route::get('reject/{id}','ManagerController@reject')->name('reject');
    Route::get('add-work-calendar','ManagerController@showAddWorkCalendarForm')->name('add-work-calendar');
    Route::post('add-work-calendar','ManagerController@addWorkCalendar');

// ADMIN
    // Register
    Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register','Auth\RegisterController@register');
    // Update
    Route::post('update-info','AdminController@update')->name('update-info');
    Route::get('update/{id}','AdminController@showUpdateForm')->name('update');
    // Search
    Route::get('search','AdminController@showSearchForm')->name('search');
    Route::post('search-detail','AdminController@search')->name('search-detail');

    // View detail
    Route::get('detail/{id}','AdminController@showStaffDetail')->name('detail');
    Route::get('edit-basic/{id}','AdminController@showEditBasicForm')->name('edit-basic');
    Route::post('basic-edit', 'AdminController@editBasic')->name('basic-edit');
    Route::post('work-edit', 'AdminController@editWork')->name('work-edit');
    Route::get('edit-work/{id}','AdminController@showEditWorkForm')->name('edit-work');
    Route::get('delete/{id}','AdminController@delete')->name('delete');

    // Staff list
    Route::get('staff','AdminController@showStaff')->name('staff');
    Route::get('{unit}','AdminController@showUnitDetail')->name('staff-unit');
