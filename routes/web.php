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
    return redirect('/admin/post/');
});

Route::group(['namespace' => 'Admin', 'prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'browser.counter'], function(){
    Route::resource('post', 'PostController')->except(['show']);
    Route::resource('category', 'CategoryController')->except(['show']);
});

Route::group(['namespace' => 'User', 'prefix' => '/user'], function(){

});


