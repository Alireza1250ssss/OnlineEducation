<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('mainPage');
});
Route::post('/register',[UserAuth::class,'register']);
Route::view('/register','register');
Route::post('/login',[UserAuth::class,'login']);
Route::view('/login','login')->name('login');
Route::view('/register','register')->name('register');
Route::get('/dashboard',[DashboardController::class,'showDashboard'])->middleware('auth');
Route::get('/dashboard/course/{course}',[DashboardController::class,'courseDashboard'])->middleware('auth');
Route::post('/course-user/{course}',[CourseUserController::class,'store'])->middleware('auth');
Route::resources([
    'users'=> UserController::class,
    'courses'=>CourseController::class,
]);

