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

Route::post('/follow/{user}', 'FollowsController@store');
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');
Route::get('/p/show/{post}', 'PostController@show');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::get('/', 'PostController@index');