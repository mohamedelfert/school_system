<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Student routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    Route::group(['namespace' => 'Students'], function () {
        Route::get('/students/dashboard', 'StudentController@studentDashboard');
    });

    Route::group(['namespace' => 'Students\Dashboard'], function () {
        Route::resource('student-exams', 'ExamController');
        Route::get('/student-profile', 'DashboardController@showProfile')->name('student.showProfile');
        Route::post('/student-profile/{id}', 'DashboardController@updateProfile')->name('student.updateProfile');
    });

});
