<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Main Route
Route::get('/', 'HomeController@index');

// Auth Route
Auth::routes();

// Home Route
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'authenticated'], function()
{
	// Posts Route
    Route::resource('posts', 'PostsController', ['except' => ['index']]);

    // Settings Route
	Route::get('/settings','UsersController@show');
	Route::post('/settings/update','UsersController@update');
});

// Comments Route
Route::resource('comments','CommentsController');

// Blog Route
Route::get('/blog/{id}','BlogPostsController@index');
Route::get('/blog/{name}/{postId}','BlogPostsController@show');
Route::post('/blog/comment','BlogPostsController@store');