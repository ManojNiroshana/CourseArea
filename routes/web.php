<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('content.home');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-course', [App\Http\Controllers\CourseController::class, 'add_course'])->name('add_course');
Route::post('/save-course', [App\Http\Controllers\CourseController::class, 'save_course'])->name('save_course');
Route::get('/view-courses', [App\Http\Controllers\CourseController::class, 'view_courses'])->name('view_courses');
Route::get('/assign-course', [App\Http\Controllers\CourseController::class, 'assign_course'])->name('assign_course');
Route::post('/save-assign-course', [App\Http\Controllers\CourseController::class, 'save_assign_course'])->name('save_assign_course');
Route::get('/enroll-course/{id}', [App\Http\Controllers\CourseController::class, 'enroll_course'])->name('enroll_course');
