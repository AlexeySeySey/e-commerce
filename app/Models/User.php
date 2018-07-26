<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart()
    {
        return $this->hasMany('App\Models\Cart','user_id');
    }

    public function user_like()
    {
        return $this->belongsToMany('App\Models\Good','likes');
    }

    public function follow()
    {
        return $this->hasOne('App\Models\Follower','users_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
