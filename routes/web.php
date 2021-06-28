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
Route::get('/', 'StudentController@index')->name('students.index');

Route::resource('students', StudentController::class);
Route::resource('students-marks', StudentMarksController::class);
Route::get('students/{id}/delete', 'StudentController@delete')->name('students.delete');
Route::get('students-marks/{id}/delete', 'StudentMarksController@delete')->name('students-marks.delete');