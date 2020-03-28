<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'username'
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

    public function following() {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        ); 
    }

    public function followers() {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    /*
        Get tweets, via our followers using our user_id matched up with the user_id on the followers table
        and then getting the tweet id matched with the following_id
    */
    public function tweetsFromFollowing() {
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }
}
