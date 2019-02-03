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
        $total = 0;

        $orders = Cart::where('user_id',\Auth::id())->get()->toArray();
 
        foreach($orders as $order){
          $placeholder = Good::where('id',$order['good_id'])->get()->toArray();
          $count = $order['goods_count'];
          $goods[] = [
                     "good" => $placeholder,
                     "good_count" => $count,
                     "price" => $placeholder[0]['price'] * $count
           ];
         }

        foreach($goods as $good){
            $total += $good['price'];
        }      

        return view('main_layouts.checkout',[
            'goodsIn' => $goods,
            'total' => $total
        ]);
    }

}