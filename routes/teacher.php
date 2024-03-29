<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Teacher routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    // forward to dashboard student
//    Route::get('/teachers/dashboard', function () {
////        $sectionIds = \App\Models\Teacher::findOrFail(auth::user()->id)->sections()->pluck('section_id');
////        $sectionsCount = $sectionIds->count();
////        $studentsCount = \App\Models\Student::whereIn('section_id',$sectionIds)->count();
//
//        $sectionIds = DB::table('teachers_sections')->where('teacher_id', auth()->user()->id)
//            ->pluck('section_id');
//        $sectionsCount = $sectionIds->count();
//        $studentsCount = DB::table('students')->whereIn('section_id',$sectionIds)->count();
//        return view('teachers.dashboard', compact('sectionsCount', 'studentsCount'));
//    });  Or

    Route::group(['namespace' => 'Teachers'], function () {
        Route::get('/teachers/dashboard', 'TeacherController@teacherDashboard');
    });

    Route::group(['namespace' => 'Teachers\Dashboard'], function () {
        Route::get('/teachers/students', 'DashboardController@students')->name('students');
        Route::get('/teachers/sections', 'DashboardController@sections')->name('sections');
        Route::post('/students/attendance', 'DashboardController@attendance')->name('attendance.store');
        Route::get('/attendance-reports', 'DashboardController@attendanceReports')->name('attendance-reports');
        Route::post('/attendance-search', 'DashboardController@attendanceSearch')->name('attendance-search');

        Route::resource('/tests', 'ExamController');
        Route::resource('/test-questions', 'QuestionController');

        // this route to get Chapters Name by ajax when he chose Grade.
        Route::get('/chapters/{id}', 'ExamController@getChapters');
        // this route to get Section Name by ajax when he chose Grade.
        Route::get('/sections/{id}', 'ExamController@getSections');

        Route::resource('/online-classes', 'OnlineClassController');
        Route::get('indirect-online', 'OnlineClassController@indirectCreate')->name('indirect.create');
        Route::post('indirect-online', 'OnlineClassController@indirectStore')->name('indirect.store');
        Route::put('indirect-online', 'OnlineClassController@indirectUpdate')->name('indirect.update');

        Route::get('/teacher-profile', 'DashboardController@showProfile')->name('teacher.showProfile');
        Route::post('/teacher-profile/{id}', 'DashboardController@updateProfile')->name('teacher.updateProfile');

        Route::get('/student-degrees/{id}', 'ExamController@studentTests')->name('student.degrees');
        Route::post('/test-repeat', 'ExamController@testRepeat')->name('test.repeat');
    });

});
