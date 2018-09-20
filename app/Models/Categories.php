<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;


    protected $table = 'categories';

    protected $dates = ['deleted_at'];

    protected $softDelete = true;


    public function good()
    {
        return $this->belongsToMany('App\Models\Good','good_categorie','good_id','categorie_id');
    }

}
