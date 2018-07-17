<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    //粉丝一一对应
    public function fuser(){
        return  $this->hasOne('App\User','id','fan_id');
    }

    //关注
    public function suser(){
        return $this->hasOne('App\User','id','start_id');
    }






}
