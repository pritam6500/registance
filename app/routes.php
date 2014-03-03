<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|



Route::get('about', function()
{
  return View::make('about');
});
Route::get('contact', 'Pages@contact');

Route::resource('users', 'UserController');
Route::controller('/','EntriesController' );*/

Route::get('/', 'IndexController@Index');

Route::controller('logout', 'LogoutController');
Route::controller('login','LoginController' );
Route::controller('signup','SignupController' );
Route::controller('compose','ComposeController');
Route::controller('save','SavemsgController');
Route::controller('like','LikeController');
Route::controller('dislike','DislikeController');
Route::controller('addcmnt','AddcometController');
Route::controller('showcmnt','ShowcometController');
Route::controller('draft','DraftController');

