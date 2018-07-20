<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    protected $table = 'black_lists';

    public function user()
    {
        return $this->hasMany('App\User','users_id');
    }
}
