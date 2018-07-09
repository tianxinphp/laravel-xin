<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //必须是本人才能修改
    public function update(User $user, Post $post){
        return $user->id==$post->user_id;
    }

    //必须是本人才能删除
    public function  delete(User $user, Post $post){
        return $user->id==$post->user_id;
    }
}
