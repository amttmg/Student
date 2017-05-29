<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/course', 'CourseController@index');
Route::get('/student', 'StudentController@index')->name('student');
Route::get('/', 'StudentController@index')->name('student');
Route::get('/getstudent', 'StudentController@getByCagetory');
Route::get('/studententry', 'StudentController@create')->name('studententry');
Route::post('/studententry', 'StudentController@store');
Route::get('/studentedit/{id}', 'StudentController@edit');
Route::post('/studentedit/{student}', 'StudentController@update');
Route::get('/data','StudentController@data');
Route::get('/vue','VueController@index');