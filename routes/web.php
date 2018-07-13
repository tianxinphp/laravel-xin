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


//文章列表
Route::get('/posts','PostController@index');
//文章详情
Route::get('/posts/create','PostController@create');
Route::get('posts/search','PostController@search');
Route::get('/posts/{post}','PostController@show');
//创建
Route::post('/posts','PostController@store');
//编辑
Route::get('/posts/{post}/edit','PostController@edit');
Route::put('/posts/{post}','PostController@update');
//删除
Route::get('/posts/{post}/delete','PostController@delete');

Route::post('/posts/{post}/comment','PostController@comment');

Route::get('posts/{post}/zan','PostController@zan');

Route::get('posts/{post}/unZan','PostController@unZan');

//上传
Route::post('/posts/image/upload','PostController@imageUpload');

Route::get('/register','RegisterController@index');

Route::post('/register','RegisterController@register');

Route::get('/login','LoginController@index');

Route::post('/login','LoginController@login');

Route::get('/loginOut','LoginController@loginOut');





