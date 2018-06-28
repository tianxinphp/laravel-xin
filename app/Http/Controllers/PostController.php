<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return view("post/index");
    }

    public function create(){
        return view("post/create");
    }

    public function store(){

    }

    public function show(){
        return view("post/show",['title'=>'标题1','title2'=>'标题2','isShow'=>true]);
    }

    public function edit(){
        return view("post/edit");
    }

    public function update(){

    }

    public function delete(){

    }
}
