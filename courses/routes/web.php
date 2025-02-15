<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CourseController::class, 'getCourses']);
Route::post('/add-course', [CourseController::class, 'addCourse']);
Route::get('/course/{id}', [CourseController::class, 'getContent']);
Route::post('/add-file', [CourseController::class, 'addFile']);
Route::post('/add-video', [CourseController::class, 'addVideo']);
