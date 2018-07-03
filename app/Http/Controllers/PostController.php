<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
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

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
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
