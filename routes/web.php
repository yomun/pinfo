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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get( '/contact',  'ContactController@edit')->name('contact');
Route::post('/contact',  'ContactController@store');

Route::get('/contacts', 'ContactController@show')->name('contacts');

Route::get('/users',   'UserController@index')->name('users');
Route::post('/users',  'UserController@show');

Route::resource('user', 'UserController');
