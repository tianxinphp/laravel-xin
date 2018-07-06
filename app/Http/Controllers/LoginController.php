<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/5
 * Time: 17:27
 */

namespace App\Http\Controllers;


class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(){
        $this->validate(\Request::instance(),[
            'email'=>'required|email',
            'password'=>'required|min:6|max:10',
            'is_remember'=>'integer'
        ]);
        $user=request(['email','password']);
        $is_remember=request('is_remember');
        if(\Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }
        return \Redirect::back()->withErrors('账号密码错误');
    }

    public function loginOut(){

    }
}