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

// @TODO actions to controller
Route::view('/', 'messages.index')->name('messages.index');
Route::view('user/create', 'user.create')->name('user.create');

//GET routes
Route::get('/', 'App\Http\Controllers\MessageController@index')->name('messages.index');
Route::get('create', 'App\Http\Controllers\MessageController@create')->name('messages.create');
Route::get('users', 'App\Http\Controllers\UserController@getAllUsers')->name('users');

//POST routes
Route::post('user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::post('message/store','App\Http\Controllers\MessageController@store')->name('message.store');
