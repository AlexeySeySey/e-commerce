<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{

    protected $table = 'goods';

    public function categorie()
    {
        return $this->belongsTo('App\Categories','categories_id');
    }

    public function characteristic()
    {
        return $this->hasOne('App\Characteristic','goods_id');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale','sales_id');
    }

    public function like()
    {
        return $this->belongsToMany('App\User','likes');
    }
}
