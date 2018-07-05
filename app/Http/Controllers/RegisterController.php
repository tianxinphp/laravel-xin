<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/5
 * Time: 15:10
 */
namespace App\Http\Controllers;

use App\User;

class RegisterController extends Controller{
    public function index(){
        return view('register.index');
    }

    public function register(){
        $this->validate(\Request::instance(),[
            'name'=>'required|min:6|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:6|max:10|confirmed'
        ]);

        $user=new User();
        $user->name=request('name');
        $user->email=request('email');
        $user->password=bcrypt(request('password'));
        $user->save();
        return redirect('/posts');
    }
}