<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Good;
use Auth;
use App\Cart;
use App\Traits\UserDataTrait;

class BestController extends Controller
{
    use UserDataTrait;

    public function show()
    {
        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->orderBy('rating', 'DESC')
            ->take(12)
            ->get();

        $id = Auth::id();

        $follow = $this->follower($id);
        $checkoutCount = $this->checkoutCount();
        $checkoutPrice = $this->checkoutPrice($id);

        return view('products', [
            'goods'  => $goods,
            'id'     => $id,
            'image'  => null,
            'checkoutCount'=>$checkoutCount,
            'checkoutPrice'=>$checkoutPrice,
            'follow' => $follow
        ]);
    }
}
