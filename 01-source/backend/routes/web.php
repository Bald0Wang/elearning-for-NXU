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


Route::middleware('web')->namespace('Admin')->group(function(){
     /*
        |-------------------------------------------------------------------------------
        | 试卷信息后台部分
        |-------------------------------------------------------------------------------
        | URL:            http://localhost:8000/admin/paper
        | Controller:     PaperController
        | Modle:          Paper
        | Description:    试卷信息后台部分
        */
    Route::resource('admin/paper','PaperController');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
