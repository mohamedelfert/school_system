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

Auth::routes();

// if user didn't login forward to login page
Route::group(['middleware' => 'guest'], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

//        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//        Route::get('/', function()
//        {
//            return view('dashboard');
//        });

        // forward to dashboard
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::group(['namespace' => 'Grades'],function (){
            Route::resource('/grade','GradeController');
        });
});
