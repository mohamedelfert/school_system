<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Parent Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Parent routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    Route::group(['namespace' => 'Parents'], function () {
        Route::get('/parents/dashboard', 'ParentController@parentDashboard')->name('parent.dashboard');
        Route::get('/children', 'ParentController@parentChildren')->name('parent.children');
        Route::get('/children-results/{id}', 'ParentController@childrenResults')->name('children.results');
    });
});
