<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\Good;

class AddGoodController extends Controller
{

    public function add(Request $request)
    {
        $user_id = Auth::id();

        $count = $request->goods_count;
        $price = $request->price;

        if ($count == 0) {
            abort(500, 'Count is null');
        }
        if ($price == 0) {
            abort(500, 'Price is null');
        }

        $stock = Good::find(intval($request->good_id))->toArray()['stock'];
        if ($stock < ($request->goods_count)) {
            abort(500);
        }

        $check = Cart::where([
            ['user_id', $user_id],
            ['good_id', $request->good_id]
        ])->get();

        if (count($check)>0) {
            $cart = Cart::find($check->toArray()[0]['id']);
            $cart->goods_count += $request->goods_count;
            $cart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->good_id = $request->good_id;
            $cart->goods_count = $request->goods_count;
            $cart->save();
        }
        parent::chageStock($request->good_id, $count, false);

        return redirect()->back()->with('success', 1);
    }
}
