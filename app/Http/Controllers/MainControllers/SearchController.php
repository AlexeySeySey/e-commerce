<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{


    public function search(Request $request)
    {

        if (intval(trim($request->name)) != 0) {
            abort(400, 'Illegal symbol');
        }

        $name = trim(strip_tags($request->name));

        $goods = Good::where('name', 'like', '%'.$name.'%')->with([
            'characteristic',
            'categorie',
            'sale',
            'like'
        ])->paginate(6);

        return view('main_layouts.searchProduct', [
            'goods'  => $goods
        ]);
    }

}
