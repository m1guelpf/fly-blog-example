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

Route::group(['domain' => '[YOUR_APP_DOMAIN_HERE]'], function () {
    Route::get('/', 'PostsController@index')->name('index');
});

Route::group(['domain' => '{domain}'], function () {
    Route::get('/', 'DomainController@index');
});

Route::get('/', 'PostsController@index')->name('index');

Auth::routes();

Route::get('posts/{post}', 'PostsController@show')->name('post');
Route::post('posts', 'PostsController@create')->name('create');

Route::view('domain', 'domain-setup')->middleware('auth')->name('domain-setup');
Route::post('domain', 'DomainController@create')->middleware('auth');
