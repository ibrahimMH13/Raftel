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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Threads
Route::get('/threads/create','ThreadController@create');
Route::get('/threads','ThreadController@index');
Route::get('/threads/{channel}','ThreadController@index');
Route::post('/threads/create','ThreadController@store');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Route::delete('/threads/{channel}/{thread}','ThreadController@destroy');

//Reply
Route::post('/threads/{channel}/{thread}/{replies}','ReplyController@store');
Route::delete('/reply/{replies}','ReplyController@destroy');

//Favirted
 Route::post('/replies/{reply}/favorite','FavoriteController@store');

 Route::get('/Profile/{user}','ProfileController@show')->name('profile');