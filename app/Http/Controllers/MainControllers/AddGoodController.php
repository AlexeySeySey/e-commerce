<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Characteristic;
use App\Models\Cart;
use Auth;
use App\Http\Controllers\Controller;

class AddGoodController extends Controller
{

    public function add(Request $request)
    {

        $user_id = Auth::id();

        $count = intval($request->goods_count);
        $price     = intval($request->price);


        if ($count == 0) {
            abort(500,'Count is null');
        }
        if ($price == 0) {
            abort(500,'Price is null');
        }

        $stock = (((Characteristic::select('stock')->where('goods_id', $request->good_id)->get())->toArray())[0])['stock'];
        if ($stock < ($request->goods_count)) {
            abort(500);
        }

        $cart          = new Cart;
        $cart->user_id   = $user_id;
        $cart->good_id    = $request->good_id;
        $cart->goods_count = $request->goods_count;
        $cart->save();
       
        $characteristic = Characteristic::find($request->good_id);
        $characteristic->stock -= $request->goods_count;
        $characteristic->save();

        return redirect()->back()->with('success',1);
    }
}
