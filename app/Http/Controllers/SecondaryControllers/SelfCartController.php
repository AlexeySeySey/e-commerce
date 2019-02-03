<?php

namespace App\Http\Controllers\SecondaryControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class SelfCartController extends Controller
{
    public function drop(Request $req){

        parent::chageStock($req->good_id, $req->count, false);  

        Cart::where([
                ['user_id', $req->user_id],
                ['good_id', $req->good_id]
            ])->delete();

        return; 
    }
}
