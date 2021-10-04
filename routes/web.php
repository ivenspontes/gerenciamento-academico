<?php

use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\HoraryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    return view('welcome');
});

Route::resource('teacher', TeacherController::class)
    ->missing(function (Request $request) {
        return Redirect::route('teacher.index');
    });

Route::resource('discipline', DisciplineController::class)
->missing(function (Request $request) {
    return Redirect::route('discipline.index');
});

Route::resource('horary', HoraryController::class)
->missing(function (Request $request) {
    return Redirect::route('horary.index');
});

Route::resource('student', StudentController::class)
->missing(function (Request $request) {
    return Redirect::route('student.index');
});
