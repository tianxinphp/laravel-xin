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

    public function edit(){
        return view("post/edit");
    }

    public function update(){

    }

    public function delete(){

    }

    public function imageUpload(Request $request){
        $path=$request->file('wangEditorH5File')->storePublicly(md5(time()));
        dd($path);
        dd(asset('storage/'.$path));
    }
}
