<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public function good()
    {
        return $this->hasMany('App\Good','sales_id');
    }
}
