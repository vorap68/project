<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('category',App\Http\Controllers\CategoryController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('task/create/{category}','App\Http\Controllers\TaskController@create')->name('task.create');
Route::post('task/store/{category}','App\Http\Controllers\TaskController@store')->name('task.store');
Route::get('task/show/{category}/{task}','App\Http\Controllers\TaskController@show')->name('task.show');

Route::put('task/update/{task}','App\Http\Controllers\TaskController@update')->name('task.update');

Route::get('task/manage/{category}','App\Http\Controllers\TaskController@manage')->name('task.manage');
Route::get('task/destroy/{task}','App\Http\Controllers\TaskController@destroy')->name('task.destroy');
Route::get('task/edit/{task}','App\Http\Controllers\TaskController@edit')->name('task.edit');
Route::get('task/share/{task}','App\Http\Controllers\TaskController@share')->name('task.share');
Route::post('task/share/store/{task}','App\Http\Controllers\TaskController@shareStore')->name('task.share.store');
Route::get('task/closed/{task}','App\Http\Controllers\TaskController@closed')->name('task.closed');

