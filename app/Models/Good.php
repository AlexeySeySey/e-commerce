<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Good extends Model
{
    public function categorie()
    {
    return $this->belongsToMany('App\Models\Categories','good_categorie','good_id','categorie_id');
    }

    public function characteristic()
    {
        return $this->hasOne('App\Models\Characteristic','goods_id');
    }

    public function sale()
    {
        return $this->belongsToMany('App\Models\Sale','good_sale','good_id','sale_id');
    }

    public function like()
    {
        return $this->belongsToMany('App\Models\User','good_like','good_id','user_id');
    }
}
