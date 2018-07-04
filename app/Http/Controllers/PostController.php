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

    public function store(){
        $this->validate(request(),[
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

    public function edit(Post $post){
        return view("post/edit",compact('post'));
    }

    public function update(Post $post){
        $this->validate(request(),[
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
        ]);
        $post->title=request('title');
        $post->content=request('content');
        $post->save();
        return redirect('/posts');
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/posts');
    }

    public function imageUpload(Request $request){
        $path=$request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }
}
