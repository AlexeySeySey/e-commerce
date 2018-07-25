<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Cart;
use App\Models\Categories;
use App\Models\Follower;
use App\Models\Sale;
use Auth;
use App\Http\Controllers\Controller;

class StartController extends Controller
{

    public function show()
    {
        $categories = Categories::with('good')->get();

        $sales = Sale::with('good')
            ->orderBy('percentages', 'DESC')
            ->take(6)
            ->get();

        $id = Auth::id();

        return view('main_layouts.start', [
            /*'checkoutCount' => $checkoutCount,
            'checkoutPrice' => $checkoutPrice,*/
            'categories'    => $categories,
            //'follow'        => $follow,
            'goods'         => $sales,
            'id'            => $id
        ]);
    }
}
