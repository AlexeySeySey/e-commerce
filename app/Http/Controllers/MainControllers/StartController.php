<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\User;
use Auth;

class StartController extends Controller
{

    public function show()
    {

        $sales = Sale::with('good')
            ->orderBy('percentages', 'DESC')
            ->take(6)
            ->get();

        $id = Auth::id();

        $follow = (((User::select('isFollow')->where('id', $id)->get())->toArray())[0])['isFollow'];

        $checkoutCount = Cart::where('user_id',$id)->count('*');
        $checkoutAllCount = Cart::where('user_id',$id)->sum('count');
        $checkoutPrice = Cart::where('user_id', $id)->sum('price');

        return view('main_layouts.start', [
            'checkoutCount' => $checkoutCount,
            'checkoutAllCount'=>$checkoutAllCount,
            'checkoutPrice' => $checkoutPrice,
            'follow'        => $follow,
            'goods'         => $sales,
            'id'            => $id
        ]);
    }
}
