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

Route::get('/', 'PostController@index');

Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store')->name('follows.store');

Route::get('/p/create', 'PostController@create')->name('post.create');
Route::get('/p/{post}', 'PostController@show')->name('post.show');
Route::post('/p', 'PostController@store')->name('post.store');

Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
