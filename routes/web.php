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

Route::get('/', 'CustomerController@index');
Route::resource('customers', 'CustomerController');
Route::view('about', 'about');
Route::view('contact', 'contact');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
