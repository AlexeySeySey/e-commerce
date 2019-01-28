<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Cart;
use App\Models\Info;

class CheckoutController extends Controller
{


    public function show()
    {
        $goods = [];
        $orders = Cart::select(['goods_count','good_id'])->where('user_id',\Auth::id())->get();

      
        foreach($orders->toArray() as $order){
          $goods[] = [
                     "good" => Good::where('id',$order['good_id'])->get(),
                     "good_count" => $order['goods_count']
           ];
         }
   
        return view('main_layouts.checkout')->with('goods', $goods);
    }

}