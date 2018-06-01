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
//    return view('welcome');
    redirect()->route('index');
});



Route::get('view/{name?}/{id?}',function ($website='laravel-xin',$id='333'){
    return 'you route to'.route('index',['website'=>$website,'id'=>$id]);
})->name('index');