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
Route::get('show-create-account', 'Admin\AccountController@showCreateAccount')->name('show-create-account');
Route::post('create-account', 'Admin\AccountController@createAccount')->name('create-account');
Route::get('show-search', 'Admin\SearchController@showSearchForm')->name('show-search');
Route::get('search', 'Admin\SearchController@search')->name('search');

Route::get('profile','Admin\UserController@showProfile')->name('profile');

// Route::get('detail-{id}','Admin\EditAccountController@showDetailAccount')->name('detail');
Route::get('detail-{id}-{component}','Admin\EditAccountController@showDetailAccount')->name('detail');
Route::post('edit-basic-info','Admin\EditAccountController@editBasicInfo')->name('edit-basic-info');
Route::post('edit-edu','Admin\EducationController@editEducation')->name('edit-edu');
Route::post('add-edu','Admin\EducationController@addEducation')->name('add-edu');
Route::post('edit-train','Admin\TrainingController@editTrain')->name('edit-train');
Route::post('add-train','Admin\TrainingController@addTrain')->name('add-train');
Route::post('edit-com','Admin\CompanyController@editCompany')->name('edit-com');
Route::post('add-com','Admin\CompanyController@addCompany')->name('add-com');
Route::post('edit-gov','Admin\GovernmentController@editGov')->name('edit-gov');
Route::post('add-gov','Admin\GovernmentController@addGov')->name('add-gov');
Route::post('edit-party','Admin\PartyController@editParty')->name('edit-party');
Route::post('add-party','Admin\PartyController@addParty')->name('add-party');
Route::post('edit-family','Admin\FamilyController@editFamily')->name('edit-family');
Route::post('add-family','Admin\FamilyController@addFamily')->name('add-family');
Route::post('edit-foreigner','Admin\ForeignerController@editForeigner')->name('edit-foreigner');
Route::post('add-foreigner','Admin\ForeignerController@addForeigner')->name('add-foreigner');
Route::post('edit-laudatory','Admin\LaudatoryController@editLaudatory')->name('edit-laudatory');
Route::post('add-laudatory','Admin\LaudatoryController@addLaudatory')->name('add-laudatory');
Route::post('edit-discipline','Admin\DisciplineController@editDiscipline')->name('edit-discipline');
Route::post('add-discipline','Admin\DisciplineController@addDiscipline')->name('add-discipline');
Route::get('edit-{id}','Admin\ProcessController@showEditProcess')->name('show-edit');
Route::post('edit-pr','Admin\ProcessController@editProcess')->name('edit-pr');
Route::post('edit-application','Admin\ApplicationController@editApp')->name('edit-application');

Route::get('print-{user_id}','Admin\EditAccountController@printProfile')->name('print');

Route::post('update-pr','Admin\ProcessController@updateProcess')->name('update-pr');
Route::get('update-{user_id}','Admin\ProcessController@showUpdateProcess')->name('show-update');

Route::get('calendar','CalendarController@showCalendar')->name('calendar');
Route::get('get-calendar','CalendarController@getCalendar')->name('get-calendar');
Route::get('get-time-{day}-{month}-{year}','CalendarController@getTimeDay')->name('get-time');

Route::post('export', 'ExcelController@export')->name('export');

Route::get('show-app-{user_id}', 'Admin\ApplicationController@showAppForm')->name('show-app');
Route::post('get-app', 'Admin\ApplicationController@getApp')->name('get-app');
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
    // Route::get('detail-{id}','AdminController@showStaffDetail')->name('detail');
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
