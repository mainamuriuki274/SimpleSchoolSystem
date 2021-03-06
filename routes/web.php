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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/student/add','App\Http\Controllers\StudentController@store');
Route::get('/student/{student}/edit','App\Http\Controllers\StudentController@edit');
Route::get('/student/{student}', 'App\Http\Controllers\StudentController@destroy');
Route::patch('/student/{user}', 'App\Http\Controllers\StudentController@update');

