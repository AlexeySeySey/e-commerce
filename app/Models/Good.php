<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Good extends Model
{
    public function categorie()
    {
       return $this->belongsTo('App\Models\Categories');
    }

    public function characteristic()
    {
        return $this->hasOne('App\Models\Characteristic','goods_id');
    }

    public function sale()
    {
        return $this->belongsTo('App\Models\Sale','sale_id');
    }

    public function like()
    {
        return $this->belongsToMany('App\Models\User','good_like','good_id','user_id');
    }
}
