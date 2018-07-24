<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Good;
use Auth;
use App\Cart;
use App\Traits\UserDataTrait;

class CategoryController extends Controller
{

    use UserDataTrait;

    public function show($id)
    {

        $name = ((((Categories::where('id', $id)->get())->toArray())[0])["name"]);

        $image = (((Categories::select('image')->where('id', $id)->get())->toArray())[0])["image"];

        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->where('categories_id', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        $id = Auth::id();

        $follow = $this->follower($id);
        $checkoutCount = $this->checkoutCount();
        $checkoutPrice = $this->checkoutPrice($id);


        return view('category', [
            'name'  => $name,
            'goods' => $goods,
            'image' => $image,
            'id'    => $id,
            'good'  => null,
            'follow'=>$follow,
            'checkoutCount'=>$checkoutCount,
            'checkoutPrice'=>$checkoutPrice
        ]);
    }
}
