<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Good;
use Auth;
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


        return view('main_layouts.searchProduct', [
            'goods'  => $goods,
            'id'     => $id/*,
            'follow' => $follow,
            'checkoutCount'=>$checkoutCount,
            'checkoutPrice'=>$checkoutPrice
        */]);
    }

}
