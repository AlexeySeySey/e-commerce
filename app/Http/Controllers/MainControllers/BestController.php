<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Auth;
use App\Models\Cart;
use App\Models\User;

class BestController extends Controller
{

    public function show()
    {
        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->orderBy('rating', 'DESC')
            ->take(12)
            ->get();

        $id = Auth::id();

        $follow = (((User::select('isFollow')->where('id', $id)->get())->toArray())[0])['isFollow'];

        $checkoutCount = Cart::where('user_id',$id)->count('*');
        $checkoutAllCount = Cart::where('user_id',$id)->sum('count');
        $checkoutPrice = Cart::where('user_id', $id)->sum('price');

        return view('main_layouts.products', [
            'follow'        => $follow,
            'checkoutCount' => $checkoutCount,
            'checkoutPrice' => $checkoutPrice,
            'checkoutAllCount'=>$checkoutAllCount,
            'goods'         => $goods,
            'id'            => $id,
            'image'         => null
        ]);
    }
}
