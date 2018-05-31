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


Route::post('world',function (){
   return 'hello world';
});

Route::get('hello',function (){
    return '<form method="POST" action="/world">' . csrf_field() . '<button type="submit">提交</button></form>';
});