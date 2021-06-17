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

Route::get('/', 'WebController@index')->name('index');
Route::get('/about', 'WebController@about')->name('about');
Route::get('/contact', 'WebController@contact')->name('contact');
Route::get('/pricing', 'WebController@pricing')->name('pricing');
Route::get('/faq', 'WebController@faq')->name('faq');
Route::get('/blog', 'WebController@blog')->name('blog');
Route::get('/blog/{slug}', 'WebController@post')->name('post');

Route::post('/send-contact', 'WebController@sendContact')->name('send-contact');
