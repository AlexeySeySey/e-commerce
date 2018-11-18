<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'good_like';

    public function user()
    {
        return $this->belongsToMany('App\Models\User','good_like','good_id','user_id');
    }
}
