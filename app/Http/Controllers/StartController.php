<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Follower;
use App\Sale;
use Auth;
use App\Traits\UserDataTrait;

class StartController extends Controller
{

    use UserDataTrait;

    public function show()
    {
        $categories = Categories::with('good')->get();

        $sales = Sale::with('good')
            ->orderBy('percentages', 'DESC')
            ->take(6)
            ->get();

        $id = Auth::id();

        $follow = $this->follower($id);
        $checkoutCount = $this->checkoutCount();
        $checkoutPrice = $this->checkoutPrice($id);

        return view('start', [
            'checkoutCount' => $checkoutCount,
            'checkoutPrice' => $checkoutPrice,
            'categories'    => $categories,
            'follow'        => $follow,
            'goods'         => $sales,
            'id'            => $id
        ]);
    }
}
