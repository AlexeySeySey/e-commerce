<?php

namespace App\Http\Controllers;

use App\Good;
use App\Sale;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cart;
use App\Traits\UserDataTrait;

class SaleGoodsController extends Controller
{

    use UserDataTrait;

    public function show(Request $request)
    {
        $id = Auth::id();

        $sale_id = $request->sale_id;

        $brokenSales = Sale::select('id')->where('end', '<=', Carbon::now())->get();

        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->where('sales_id', $sale_id)
            ->whereNotIn('sales_id', $brokenSales)
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        $follow = $this->follower($id);
        $checkoutCount = $this->checkoutCount();
        $checkoutPrice = $this->checkoutPrice($id);

        return view('products_imports.bestProductsImport', [
            'goods'  => $goods,
            'id'     => $id,
            'follow' => $follow,
            'checkoutCount'=>$checkoutCount,
            'checkoutPrice'=>$checkoutPrice
        ]);
    }
}
