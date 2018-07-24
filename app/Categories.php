<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;


    protected $table = 'categories';

   protected $dates = ['deleted_at'];

    public function good()
    {
        return $this->hasMany('App\Good','categories_id');
    }

}
