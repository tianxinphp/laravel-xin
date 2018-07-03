<?php

namespace App\Http\Controllers;

use App\Post;
class PostController extends Controller
{
    //
    public function index(){
        $posts=Post::orderBy('created_at','desc')->paginate(6);
        return view("post/index",compact('posts'));
    }

    public function create(){
        return view("post/create");
    }

    public function store(){
        $this->validate(request(),[
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
        ],[
            'title.required'=>"标题不能为空"
        ]);
        $post=new Post();
        $post->title=request('title');
        $post->content=request('content');
        $post->save();
        return redirect('/posts');
    }

    public function show(Post $post){
        return view("post/show",compact('post'));
    }

    public function edit(){
        return view("post/edit");
    }

    public function update(){

    }

    public function delete(){

    }
}
