<?php

namespace App\Traits;

use App\Cart;
use App\Follower;

trait UserDataTrait
{

    public function follower($id)
    {

        $follow = Follower::where('users_id', $id)->with('user')->get();

        return $follow;
    }

    public function checkoutCount()
    {

        $checkoutCount = Cart::count('*');

        return $checkoutCount;
    }

    public function checkoutPrice($id)
    {

        $checkoutPrice = Cart::where('id', $id)->sum('price');

        return $checkoutPrice;
    }
}