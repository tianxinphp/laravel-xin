<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //用户文章
    public function posts(){
        return $this->hasMany('App\Post','user_id','id');
    }

    //用户粉丝数
    public function fans(){
        return $this->hasMany('App\Fan','star_id','id');
    }

    //用户关注
    public function stars(){
        return $this->hasMany('App\Fan','fan_id','id');
    }


    public function doFan($uid){
        $fan=new \App\Fan();
        $fan->star_id=$uid;
        $this->stars()->save($fan);
    }

    public function unFan($uid){
        $fan=new \App\Fan();
        $fan->star_id=$uid;
        $this->stars()->delete($fan);
    }


    //被多少人关注
    public function hasFan($uid){
        return $this->fans()->where('star_id',$uid)->count();
    }

    public function hasStar($uid){
        return $this->stars()->where('fan_id',$uid)->count();
    }


}
