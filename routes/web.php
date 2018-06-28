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


Route::group(['prefix'=>'posts'],function (){
    //文章列表
    Route::get('/','PostController@index');
    //文章详情
    Route::get('/{post}','PostController@create');
    //创建
    Route::get('/create','PostController@create');
    Route::post('/','PostController@store');
    //编辑
    Route::get('/{post}/edit','PostController@edit');
    Route::post('/{post}','PostController@update');
    //删除
    Route::get('delete','PostController@delete');
});