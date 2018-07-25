<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;


    protected $table = 'categories';

   protected $dates = ['deleted_at'];

    public function good()
    {
        return $this->hasMany('App\Models\Good','categories_id');
    }

}
