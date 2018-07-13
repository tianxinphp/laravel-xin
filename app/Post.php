<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    //
//    protected $fillable=['title,content'];


    public function searchableAs()
    {
        return "post";
    }

    public function toSearchableArray()
    {
        return [
            'title'=>$this->title,
            'content'=>$this->content
        ];
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment','post_id','id')->orderBy('created_at','desc');
    }

    public function zan($user_id){
        return $this->hasOne('App\Zan','post_id','id')->where('user_id',$user_id);
    }

    public function zans(){
        return $this->hasMany('App\Zan','post_id','id');
    }

}
