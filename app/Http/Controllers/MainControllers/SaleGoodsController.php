<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Good;
use App\Models\Sale;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'goods'  => $goods,
            'id'     => $id
        ]);
    }
}
