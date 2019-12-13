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
Route::get('lang/{locale}','LangController@lang');
Route::get('update/lang/{locale}','LangController@lang');
Route::get('detail/lang/{locale}','LangController@lang');
Route::get('edit-basic/lang/{locale}','LangController@lang');

Route::get('pdf','PDFController@index');
Route::post('create-basic', 'Admin\AccountController@createBasicInfo')->name('create-basic');
Route::get('num-his-edu', 'Admin\AccountController@showNumHisEdu')->name('num-his-edu');
Route::post('num-his-edu', 'Admin\AccountController@addNumHisEdu');
Route::post('create-his-edu', 'Admin\AccountController@createHisEdu')->name('create-his-edu');
Route::post('num-his-train', 'Admin\AccountController@addNumHisTrain')->name('num-his-train');
Route::post('create-his-train', 'Admin\AccountController@createHisTrain')->name('create-his-train');
Route::post('num-his-company', 'Admin\AccountController@addNumHisCompany')->name('num-his-company');
Route::post('create-his-company', 'Admin\AccountController@createHisCompany')->name('create-his-company');
Route::post('num-his-party', 'Admin\AccountController@addNumHisParty')->name('num-his-party');
Route::post('create-his-party', 'Admin\AccountController@createHisParty')->name('create-his-party');
Route::post('num-his-gov', 'Admin\AccountController@addNumHisGov')->name('num-his-gov');
Route::post('create-his-gov', 'Admin\AccountController@createHisGov')->name('create-his-gov');

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
    // search
    Route::get('mana-search-by-name','ManagerController@showSearchByNameForm')->name('mana-search-by-name');
    Route::get('mana-search-by-name-detail','ManagerController@searchByName')->name('mana-search-by-name-detail');
    Route::get('mana-multiple-search','ManagerController@showMultipleSearchForm')->name('mana-multiple-search');
    Route::get('mana-multiple-search-detail','ManagerController@searchMultiple')->name('mana-multiple-search-detail');
    //staff list
    Route::get('mana-staff','ManagerController@showStaff')->name('mana-staff');
    Route::get('mana-detail-{user_id}','ManagerController@showStaffDetail')->name('mana-detail');
    //timekeeping
    Route::get('timekeeping','ManagerController@showTimekeeping')->name('timekeeping');
    Route::get('yes-{id}','ManagerController@timeYes')->name('yes-time');
    Route::get('no-{id}','ManagerController@timeNo')->name('no-time');
    Route::get('change-{id}','ManagerController@changeTimeStatus')->name('change-time');
    Route::get('timekeeping-search','ManagerController@showTimekeepingSearch')->name('timekeeping-search');
    Route::post('day-search','ManagerController@daySearch')->name('day-search');
    Route::post('month-search','ManagerController@monthSearch')->name('month-search');

// ADMIN
    // Register
    Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register','Auth\RegisterController@register');
    // Update
    Route::post('update-info','AdminController@update')->name('update-info');
    Route::get('update/{id}','AdminController@showUpdateForm')->name('update');
    // Search
    Route::get('search-by-name','AdminController@showSearchByNameForm')->name('search-by-name');
    Route::post('search-by-name-detail','AdminController@searchByName')->name('search-by-name-detail');
    Route::get('multiple-search','AdminController@showMultipleSearchForm')->name('multiple-search');
    Route::post('multiple-search-detail','AdminController@searchMultiple')->name('multiple-search-detail');

    // View detail
    Route::get('detail-{id}','AdminController@showStaffDetail')->name('detail');
    Route::get('edit-basic/{id}','AdminController@showEditBasicForm')->name('edit-basic');
    Route::post('basic-edit', 'AdminController@editBasic')->name('basic-edit');
    Route::get('edit-work/{user_id}','AdminController@showEditWorkForm')->name('edit-work');
    Route::get('edit-work/{user_id}/{id}','AdminController@showEditWorkDetailForm')->name('edit-work-detail');
    Route::post('work-edit', 'AdminController@editWork')->name('work-edit');
    Route::get('delete/{id}','AdminController@delete')->name('delete');
    Route::get('restore/{id}','AdminController@restore')->name('restore');

    // Staff list
    Route::get('staff','AdminController@showStaff')->name('staff');
    Route::get('staff{unit}','AdminController@showUnitDetail')->name('staff-unit');
