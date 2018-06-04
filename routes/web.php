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



Route::get('view/{name?}/{id?}',function ($website='laravel-xin',$id='333'){
    return view('welcome',['website'=>$website,'id'=>$id]);
})->name('index');

Route::get('index', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'application/json');
});

Route::prefix('/xin')->middleware('token')->group(function (){
    Route::get('index', function () {
        return redirect()->route('index');
    });
});

Route::get('user/{id}','UserController@show');

Route::get('cookie/response', function() {
    Cookie::queue(Cookie::make('site', 'Laravel学院',1));
    Cookie::queue('author', '学院君', 1);
    return response('Hello Laravel', 200)
        ->header('Content-Type', 'text/plain');
});


Route::get('/blade',function (){
    return view('layouts/child');
});


