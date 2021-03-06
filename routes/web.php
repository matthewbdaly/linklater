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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@store')->name('create');
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login_github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->name('login_github_callback');
