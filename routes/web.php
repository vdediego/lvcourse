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

Route::get('/email', function () {
    return new \App\Mail\NewUserWelcomeMail();
});

Route::post('/follow/{user}', 'FollowsController@store')->name('follows.store');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/p/create', 'PostController@create')->name('post.create');
Route::get('/p/{post}', 'PostController@show')->name('post.show');
Route::post('/p', 'PostController@store')->name('post.store');

Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/pc/create', 'PostcardController@create')->name('postcard.create');
Route::get('/pc/{postcard}', 'PostcardController@show')->name('postcard.show');
Route::post('/pc', 'PostcardController@store')->name('postcard.store');
Route::get('/pc/send/{postcard}', 'PostcardController@send')->name('postcard.send');
