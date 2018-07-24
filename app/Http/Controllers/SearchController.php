<?php

namespace App\Http\Controllers;

use App\Good;
use App\Traits\UserDataTrait;
use Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    use UserDataTrait;

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

        $follow        = $this->follower($id);
        $checkoutCount = $this->checkoutCount();
        $checkoutPrice = $this->checkoutPrice($id);

        return view('searchProduct', [
            'goods'  => $goods,
            'id'     => $id,
            'follow' => $follow,
            'checkoutCount'=>$checkoutCount,
            'checkoutPrice'=>$checkoutPrice
        ]);
    }

}
