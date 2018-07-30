<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;

class BestController extends Controller
{

    public function show()
    {
        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->orderBy('rating', 'DESC')
            ->take(12)
            ->get();

        return view('main_layouts.products', [
            'goods'         => $goods,
            'image'         => null
        ]);
    }
}
