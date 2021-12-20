<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
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

Route::view('/', 'mainPage');
Route::post('/register',[UserAuth::class,'register']);
Route::view('/register','register')->name('register');
Route::post('/login',[UserAuth::class,'login']);
Route::view('/login','login')->name('login');
Route::get('logout',[UserAuth::class,'logout']);

Route::group(['middleware'=>'auth'],function(){

    Route::group(['middleware'=>'role:manager','prefix'=>'manager','as'=>'manager.'],function(){
        Route::get('dashboard',[DashboardController::class,'showDashboard']);
        Route::get('/dashboard/course/{course}',[DashboardController::class,'courseDashboard']);
        Route::post('/course-user/{course}',[CourseUserController::class,'store']);
        Route::resources([
            'users'=> UserController::class,
            'courses'=>CourseController::class,
        ]);
    });

    Route::group(['middleware'=>'role:teacher','prefix'=>'teacher','as'=>'teacher.'],function(){
        Route::get('dashboard',[DashboardController::class,'showDashboard'])->name('dashboard');
        Route::get('/dashboard/course/{course}',[DashboardController::class,'teacherCourse'])->name('course');
        Route::resources([
            'exams'=>ExamController::class,
            'questions'=>QuestionController::class
        ]);
        Route::post('/exam-question/{exam}',ExamQuestionController::class)->name('exam-question');
    });
});






