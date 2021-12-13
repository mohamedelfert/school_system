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

        Route::group(['namespace' => 'Specializations'],function (){
            Route::resource('/specialization','SpecializationController');
        });

        Route::group(['namespace' => 'Chapters'],function (){
            Route::resource('/chapter','ChapterController');
            Route::post('delete_checked_chapters','ChapterController@delete_checked')->name('delete_checked_chapters');
            Route::post('filter_chapters','ChapterController@filter_chapters')->name('filter_chapters');
        });

        Route::group(['namespace' => 'Sections'],function (){
            Route::resource('/section','SectionController');
            // this route to get Chapters Name by ajax when he chose Grade.
            Route::get('/chapter/{id}','SectionController@getChaptersName');
        });

        Route::view('/parent','livewire.show_form');

        Route::group(['namespace' => 'Teachers'],function (){
            Route::resource('/teacher','TeacherController');
        });

        Route::group(['namespace' => 'Students'],function (){
            Route::resource('/student','StudentController');
            // this route to get Chapters Name by ajax when he chose Grade.
            Route::get('/chapter/{id}','StudentController@getChapters');
            // this route to get Section Name by ajax when he chose Grade.
            Route::get('/section/{id}','StudentController@getSections');
            // to add new attachments
            Route::post('upload_attach','StudentController@upload_attach');
            // to show photo
            Route::get('viewPhoto/{student_name}/{file_name}','StudentController@showPhoto');
            // to download photo
            Route::get('download/{student_name}/{file_name}','StudentController@downloadPhoto');
            // to Delete photo
            Route::post('delete_photo','StudentController@deletePhoto')->name('delete_photo');
        });
});
