<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public function good()
    {
        return $this->belongsToMany('App\Models\Good','good_sale','sale_id','good_id');
    }
}
