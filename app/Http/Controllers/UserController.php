<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user){
        $user=User::withCount(['fans','stars','posts'])->find($user->id);
        $posts=$user->posts()->orderBy('created_at','desc')->take(10)->get();
        $fans=$user->fans;
        $fusers=User::whereIn('id',$fans->pluck('fan_id'))->withCount(['fans','stars','posts'])->get();
        $stars=$user->stars;
        $susers=User::whereIn('id',$stars->pluck('start_id'))->withCount(['fans','stars','posts'])->get();
        return view('user/show',compact('user','posts','fusers','susers'));
    }

    public function fan(){

    }

    public function unfan(){

    }
}
