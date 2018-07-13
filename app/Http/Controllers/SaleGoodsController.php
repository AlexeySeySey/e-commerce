<?php

namespace App\Http\Controllers;

use App\Good;
use App\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class SaleGoodsController extends Controller
{

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

        return view('products_imports.bestProductsImport', [
            'goods' => $goods,
            'id'=>$id
        ]);
    }
}
