<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $table = 'characteristics';

    public $timestamps = false;

    public function good()
    {
        return $this->belongsTo('App\Good','id');
    }
}
