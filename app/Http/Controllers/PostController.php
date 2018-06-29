<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    //
    public function index(){
        $posts=Post::orderBy('create_at','desc')->get();
        return view("post/index",compact('posts'));
    }

    public function create(){
        return view("post/create");
    }

    public function store(){

    }

    public function show(){
        $title1='标题1';
        $title2='标题2';
        $isShow=true;
        return view("post/show",compact('title1','title2','isShow'));
    }

    public function edit(){
        return view("post/edit");
    }

    public function update(){

    }

    public function delete(){

    }
}
