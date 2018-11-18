<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use Billable;

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
        return $this->belongsToMany('App\Models\Good','good_like','user_id','good_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function role()
    {
       return $this->belongsToMany('App\Role','role_user','user_id');
    }

    public function mail()
    {
        return $this->hasMany('App\Models\Mail','user_id');
    }

   public function scopeUserSearch($query,$admin_id,$auth_id,$search)
   {
       return $query->where([
        ['id', '!=', $admin_id],
        ['id','!=',$auth_id],
        ['name','like','%'.$search.'%']
    ])->orWhere([
        ['id', '!=', $admin_id],
        ['id','!=',$auth_id],
        ['email','like','%'.$search.'%']
    ]);
   }

}
