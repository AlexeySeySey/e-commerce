<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;
use App\Models\Cart;
use App\Models\User;
use Artisan;
use Auth;

class CategoryController extends Controller
{

    public function show($id)
    {

        $name = ((((Categories::where('id', $id)->get())->toArray())[0])["name"]);

        $image = (((Categories::select('image')->where('id', $id)->get())->toArray())[0])["image"];

        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->where('categories_id', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        $id = Auth::id();

        $follow = (((User::select('isFollow')->where('id', $id)->get())->toArray())[0])['isFollow'];

        $checkoutCount = Cart::where('user_id',$id)->count('*');
        $checkoutAllCount = Cart::where('user_id',$id)->sum('count');
        $checkoutPrice = Cart::where('user_id', $id)->sum('price');

        return view('main_layouts.category', [
            'follow'        => $follow,
            'checkoutCount' => $checkoutCount,
            'checkoutPrice' => $checkoutPrice,
            'checkoutAllCount'=>$checkoutAllCount,
            'name'          => $name,
            'goods'         => $goods,
            'image'         => $image,
            'id'            => $id,
            'good'          => null
        ]);
    }

}
