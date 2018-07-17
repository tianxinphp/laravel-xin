<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user){
        dd($user);
//        $user=User::find($user->id)->withCount(['fans','stars','posts']);
//        dd($user);
//        $post=$user->posts()->orderBy('created_at','desc')->take(10)->get();
//        $fans=$user->fans;
//        $fusers=User::whereIn('id',$fans->pluck('fan_id'))->withCount(['fans','stars','posts'])->get();
//        $stars=$user->stars;
//        $susers=User::whereIn('id',$stars->pluck('start_id'))->withCount(['fans','stars','posts'])->get();
//        return view('user/show',compact('user','post','fusers','susers'));
    }

    public function fan(){

    }

    public function unfan(){

    }
}
