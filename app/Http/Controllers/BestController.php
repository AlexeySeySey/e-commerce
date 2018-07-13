<?php

namespace App\Http\Controllers;

use App\Good;
use Auth;

class BestController extends Controller
{

    public function show()
    {
        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->orderBy('rating', 'DESC')
            ->take(12)
            ->get();

        $id = Auth::id();

        return view('products', [
            'goods' => $goods,
            'id'    => $id,
            'image' => null
        ]);
    }
}
