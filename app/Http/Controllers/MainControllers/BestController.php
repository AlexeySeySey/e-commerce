<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Follower;
use App\Models\Good;
use Auth;
use App\Models\Cart;
use App\Http\Controllers\Controller;

class BestController extends Controller
{

    public function show()
    {
        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->orderBy('rating', 'DESC')
            ->take(12)
            ->get();

        $id = Auth::id();

        return view('main_layouts.products', [
            'goods'  => $goods,
            'id'     => $id,
            'image'  => null#,
            #'checkoutCount'=>$checkoutCount,
            #'checkoutPrice'=>$checkoutPrice,
            #'follow' => $follow
        ]);
    }
}
