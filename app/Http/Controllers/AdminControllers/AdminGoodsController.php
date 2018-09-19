<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;

class AdminGoodsController extends Controller
{
    public function show()
    {

        $goods = Good::with(['categorie','sale','like'])->paginate(20);
        dd($goods->toArray());

        return view('Admin.adminChild', [
            'section' => 'Goods',
            'goods' => $goods,
        ]);
    }
}
