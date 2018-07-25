<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{

    protected $table = 'roles';

    public function user()
    {
        return $this->belongsToMany('App\Models\User','role_user','role_id');
    }
}
