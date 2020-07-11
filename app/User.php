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

    //他のモデルに関連付けを後で実装
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
    public function favoritesDrama()
    {
        return $this->belongsToMany('App\Drama','favorites','user_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function likesReview()
    {
        return $this->belongsToMany('App\Review','likes','user_id');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow');
    }
    public function followingUser()
    {
        return $this->belongsToMany('App\User','follows','user_id','following_user_id');
    }
    public function followedUser()
    {
        return $this->belongsToMany('App\User','follows','following_user_id','user_id');
    }

    public function requests()
    {
        return $this->hasMany('App\Request');
    }
}
