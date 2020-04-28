<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect(route('post.index'));
});

Route::group(['namespace' => 'Admin', 'prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'browser.counter'], function(){
    Route::resource('post', 'PostController')->except(['show']);
    Route::resource('category', 'CategoryController')->except(['show']);
});

Route::group(['namespace' => 'User', 'middleware' => 'browser.counter'], function(){
    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/post/{post}', 'PostController@single')->name('post.single');

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/category/{category}', 'CategoryController@single')->name('category.single');
});


