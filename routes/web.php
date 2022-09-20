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

//Auth::routes();
//
//// if user didn't login forward to login page
//Route::group(['middleware' => 'guest'], function () {
//
//    Route::get('/', function () {
//        return view('auth.login');
//    });
//
//});

Route::get('/', 'HomeController@index')->name('selection');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
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

    //======================== forward to dashboard =======================================//
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    //======================== Grades =======================================//
    Route::group(['namespace' => 'Grades'],function (){
        Route::resource('/grade','GradeController');
    });

    //======================== Specializations =======================================//
    Route::group(['namespace' => 'Specializations'],function (){
        Route::resource('/specialization','SpecializationController');
    });

    //======================== Chapters =======================================//
    Route::group(['namespace' => 'Chapters'],function (){
        Route::resource('/chapter','ChapterController');
        Route::post('delete_checked_chapters','ChapterController@delete_checked')->name('delete_checked_chapters');
        Route::post('filter_chapters','ChapterController@filter_chapters')->name('filter_chapters');
    });

    //======================== Sections =======================================//
    Route::group(['namespace' => 'Sections'],function (){
        Route::resource('/section','SectionController');
        // this route to get Chapters Name by ajax when he chose Grade.
        Route::get('/chapter-name/{id}','SectionController@getChapters');
    });

    //======================== Parent LiveWire =======================================//
    Route::view('/parent','livewire.show_form')->name('parent');

    //======================== Teachers =======================================//
    Route::group(['namespace' => 'Teachers'],function (){
        Route::resource('/teacher','TeacherController');
    });

    //======================== Students =======================================//
    Route::group(['namespace' => 'Students'],function (){
        Route::resource('/student','StudentController');
        // this route to get Chapters Name by ajax when he chose Grade.
        Route::get('/chapters-name/{id}','StudentController@getChapters');
        // this route to get Section Name by ajax when he chose Grade.
        Route::get('/sections-name/{id}','StudentController@getSections');
        // to add new attachments
        Route::post('upload_attach','StudentController@upload_attach');
        // to show photo
        Route::get('viewPhoto/{student_name}/{file_name}','StudentController@showPhoto');
        // to download photo
        Route::get('download/{student_name}/{file_name}','StudentController@downloadPhoto');
        // to Delete photo
        Route::post('delete_photo','StudentController@deletePhoto')->name('delete_photo');
        // this route for delete checked students
        Route::post('delete_checked_students','StudentController@delete_checked')->name('delete_checked_students');
        // this route for filter students based on grades
        Route::post('filter_students','StudentController@filter_students')->name('filter_students');

        // this route for students promotion
        Route::resource('/promotion','PromotionController');

        // this route for students Graduation
        Route::resource('/graduation','GraduationController');

        // this route for study fees
        Route::resource('/fees','StudyFeesController');

        // this route for study fees invoices
        Route::resource('/fees_invoices','FeesInvoicesController');

        // this route for receipt students
        Route::resource('/receipt_students','ReceiptStudentController');

        // this route for processing fees
        Route::resource('/processing_fees','ProcessingFeeController');

        // this route for payments to students
        Route::resource('/payments_students','PaymentsStudentsController');

        // this route for students attendance & absence
        Route::resource('/attendances','AttendancesController');
    });

    //======================== Subjects =======================================//
    Route::group(['namespace' => 'Subjects'],function (){
        Route::resource('/subjects','SubjectsController');
    });

    //======================== Exams =======================================//
    Route::group(['namespace' => 'Exams'],function (){
        Route::resource('/exams','ExamsController');
    });

    //======================== Questions =======================================//
    Route::group(['namespace' => 'Questions'],function (){
        Route::resource('/questions','QuestionController');
    });

    //======================== OnlineClasses =======================================//
    Route::group(['namespace' => 'OnlineClasses'],function (){
        Route::resource('/online_classes','OnlineClassController');
        Route::get('indirect','OnlineClassController@indirectCreate')->name('indirect.indirectCreate');
        Route::post('indirect','OnlineClassController@indirectStore')->name('indirect.indirectStore');
        Route::put('indirect','OnlineClassController@indirectUpdate')->name('indirect.indirectUpdate');
    });

    //======================== Libraries =======================================//
    Route::group(['namespace' => 'Libraries'],function (){
        Route::resource('/library','LibraryController');
        // to download File
        Route::get('download/{file_name}','LibraryController@downloadFile');
    });

    //======================== setting =======================================//
    Route::resource('/setting','SettingController');

});
