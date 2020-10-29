<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table="users";

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Gravatar头像和侧边栏
    public function gravatar($size='100'){
        $hash=md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    //一个用户拥有多个微博
    public function statuses(){
        return $this->hasMany(Statuses::class);
    }

    public function feed(){
        return $this->statuses()->orderBy('created_at','desc');
    }

    public function followers(){
        return $this->belongsToMany(User::Class,'followers','user_id','follower_id');
    }

    public function followings(){
        return $this->belongsToMany(User::Class,'followers','follower_id','user_id');
    }

    //关注
    public function follow($user_ids){
        if(!is_array($user_ids)){
            $user_ids=compact('user_ids');
        }
        $this->followings()->sync($user_ids,false);
    }

    //取消关注
    public function unfollow($user_ids){
        if(!is_array($user_ids)){
            $user_ids=compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    //是否关注
    public function isFollowing($user_id){
        return $this->followings->contains($user_id);
    }
}
