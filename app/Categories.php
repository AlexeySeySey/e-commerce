<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function good()
    {
        return $this->hasMany('App\Good','categories_id');
    }

}
