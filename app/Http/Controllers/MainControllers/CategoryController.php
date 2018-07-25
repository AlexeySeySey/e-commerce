<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;
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

        Artisan::call('view:clear');


        return view('main_layouts.category', [
            'name'  => $name,
            'goods' => $goods,
            'image' => $image,
            'id'    => $id,
            'good'  => null/*,
             'follow'=>$follow,
             'checkoutCount'=>$checkoutCount,
             'checkoutPrice'=>$checkoutPrice
        */
        ]);
    }

}
