<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Good;
use Auth;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{


    public function search(Request $request)
    {

        $name = trim($request->name);

        if (intval(trim($request->name)) != 0) {
            abort(500, 'Illegal symbol');
        }

        $goods = Good::where('name', 'like', '%'.$name.'%')->with([
            'characteristic',
            'categorie',
            'sale',
            'like'
        ])->paginate(6);

        $id = Auth::id();

        $follow = (((User::select('isFollow')->where('id', $id)->get())->toArray())[0])['isFollow'];

        $checkoutCount = Cart::where('user_id',$id)->count('*');
        $checkoutAllCount = Cart::where('user_id',$id)->sum('count');
        $checkoutPrice = Cart::where('user_id', $id)->sum('price');


        return view('main_layouts.searchProduct', [
            'goods'  => $goods,
            'id'     => $id,
            'follow'=>$follow,
            'checkoutCount'=>$checkoutCount,
            'checkoutAllCount'=>$checkoutAllCount,
            'checkoutPrice'=>$checkoutPrice
        ]);
    }

}
